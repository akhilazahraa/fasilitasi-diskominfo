<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Instansi;
use App\Models\Provider;
use App\Models\Tim;
use Barryvdh\DomPDF\PDF;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    protected $pdf;
    public function __construct(PDF $pdf)
    {
        $this->pdf = $pdf;
    }

    public function index()
    {
        $events = Event::with('instansi', 'providers')->get();
        $providers = Provider::all();
        return view('dashboard.events.index', [
            'title' => 'Fasilitasi | Acara',
            'events' => $events,
            'providers' => $providers
        ]);
    }

    public function getevents()
    {
        $events = Event::with('instansi')->get(); // Pastikan relasi instansi di-load
        return response()->json($events);
    }

    public function create()
    {
        $instansis = Instansi::all();
        $providers = Provider::all();
        $tims = Tim::all();
        return view('dashboard.events.create.index', [
            'title' => 'Fasilitasi | Tambah Acara',
            'instansis' => $instansis,
            'tims' => $tims,
            'providers' => $providers,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'start' => 'required|date',
            'end' => 'required|date',
            'opd_id' => 'required|exists:instansis,id',
            'location' => 'required',
            'details_location' => 'required',
            'isp_id' => 'required',
            'kebutuhan' => 'nullable',
            'documentation' => 'nullable',
            'status' => 'nullable',
            'tim' => 'required|array',
            'tim.*' => 'exists:tims,id',
        ]);

        if ($request->hasFile('documentation')) {
            $file = $request->file('documentation');
            $filename = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('documents', $filename, 'public');
            $validatedData['documentation'] = '/storage/' . $filePath;
        }

        $event = Event::create($validatedData);

        $event->tims()->attach($request->input('tim'));

        return redirect()->route('dashboard.events.index')->with('success', 'Acara berhasil ditambahkan!');
    }

    public function sendWhatsappNotification($id)
    {
        $event = Event::findOrFail($id);
        $client = new Client();
        $url = "https://api.fonnte.com/send";
        $phone = '6287810615021'; // Make sure to replace this with the actual recipient's number

        $message = "Halo *{$event->instansi->name}*,\n\n" .
            "Kami ingin memberitahukan bahwa akan ada fasilitasi *{$event->name}* di OPD Anda mulai tanggal *{$event->start}*. Harap mempersiapkan segala sesuatunya untuk acara tersebut.\n\n" .
            "Mohon tidak membalas pesan ini karena terkirim secara otomatis melalui sistem. Demikian yang dapat disampaikan, atas perhatian dan kerjasamanya kami ucapkan terimakasih\n\n" .
            "*Hormat kami,*\n" .
            "*Magang UNDIP*";

        try {
            $response = $client->post($url, [
                'form_params' => [
                    'target' => $phone,
                    'message' => $message,
                ],
                'headers' => [
                    'Authorization' => 'L!D5tg8AH4xPGk7KJ1zg'
                ],
                'verify' => false,
            ]);
            // Handle success response if needed
        } catch (\Exception $e) {
            Log::error('Gagal mengirim pesan WhatsApp: ' . $e->getMessage());
            // Handle failure response if needed
        }

        return redirect()->back()->with('success', 'Pesan WhatsApp berhasil dikirim.');
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect()->route('dashboard.events.index')->with('success', 'Acara berhasil dihapus!');
    }

    public function bulkDelete(Request $request)
    {
        $ids = $request->input('ids');

        if ($ids) {
            Event::whereIn('id', $ids)->delete();
            return redirect()->route('dashboard.events.index')->with('success', 'Acara berhasil dihapus!');
        }

        return redirect()->route('dashboard.events.index')->with('error', 'Tidak ada data yang dipilih untuk dihapus.');
    }

    public function exportPdf()
    {
        $events = Event::with('instansi', 'tims')->get();

        if ($events->isEmpty()) {
            return response()->json(['error' => 'No events found'], 404);
        }

        $pdf = $this->pdf->loadView('dashboard.events.pdf', ['events' => $events]);
        return $pdf->stream('events.pdf');
    }

    public function apiEvents()
    {
        $events = Event::with('instansi')->get();
        return response()->json($events);
    }

    public function filterISP($isp_id)
    {
        $providers = Provider::findOrFail($isp_id);
        $events = Event::where('isp_id', $isp_id)->with('instansi')->get();
        $allproviders = Provider::all();

        return view('dashboard.events.filter.providers.index', [
            'title' => 'Fasilitasi | Acara - ' . $providers->name,
            'events' => $events,
            'isp_id' => $isp_id,
            'providers' => $providers,
            'allproviders' => $allproviders,
        ]);
    }

    public function exportFilterIspPdf($isp_id)
    {
        // Ambil data event yang terkait dengan ISP
        $instansi = Instansi::find(1);
        $events = Event::where('isp_id', $isp_id)->with('instansi', 'tims')->get();
        // Ambil data provider
        $providers = Provider::findOrFail($isp_id);
        // Load view blade dengan data
        $pdf = $this->pdf->loadView('dashboard.events.filter.isp.pdf', [
            'events' => $events,
            'providers' => $providers,
            'instansi' => $instansi
        ]);

        // Stream file PDF ke browser
        return $pdf->stream('filter_events.pdf');
    }



    public function filterByIsp(Request $request)
    {
        $isp = $request->input('isp');
        $events = Event::where('isp', $isp)->with('instansi')->get();

        return view('dashboard.events.index', [
            'title' => 'Fasilitasi | Acara',
            'events' => $events,
            'selectedIsp' => $isp, // Tambahkan ini untuk mengetahui ISP yang dipilih di tampilan
        ]);
    }


    public function edit($id)
    {
        $instansis = Instansi::all();
        $tims = Tim::all();
        $events = Event::with('tims', 'instansi')->findOrFail($id);

        return view('dashboard.events.edit.index', [
            'title' => 'Fasilitasi Acara | Edit Events',
            'event' => $events,
            'instansis' => $instansis,
            'tims' => $tims,
        ]);
    }

    public function details($id)
    {
        $events = Event::with('tims', 'instansi', 'providers')->findOrFail($id);
        $tims = Tim::all();
        $providers = Provider::all();

        return view('dashboard.events.details.index', [
            'title' => 'Fasilitasi Acara | Detail Events',
            'events' => $events,
            'tims' => $tims,
            'providers' => $providers,
        ]);
    }

    public function exportSingleEventPdf($id)
    {
        $event = Event::with('instansi', 'providers', 'tims')->findOrFail($id);
        $pdf = $this->pdf->loadView('dashboard.events.details.pdf', ['event' => $event]);
        return $pdf->stream('event_' . $id . '.pdf');
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'start' => 'required|date',
            'end' => 'required|date',
            'opd_id' => 'required|exists:instansis,id',
            'location' => 'required',
            'details_location' => 'required',
            'isp_id' => 'required',
            'kebutuhan' => 'nullable',
            'status' => 'nullable',
            'tim' => 'required|array',
            'tim.*' => 'exists:tims,id',
            'kebutuhan' => 'nullable',
            'status' => 'nullable',
            'documentation' => 'nullable'
        ]);

        $event = Event::findOrFail($id);

        if ($request->hasFile('documentation')) {
            // Delete the old file if it exists
            if ($event->documentation) {
                Storage::disk('public')->delete(str_replace('/storage/', '', $event->documentation));
            }

            // Store the new file and get its path
            $file = $request->file('documentation');
            $filename = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('documents', $filename, 'public');
            $validatedData['documentation'] = '/storage/' . $filePath;
        } else {
            // If no new file is uploaded, keep the old file path
            unset($validatedData['documentation']);
        }
        $event->update($validatedData);

        // Sync the related tims
        if ($request->has('tim')) {
            $event->tims()->sync($validatedData['tim']);
        }

        return redirect()->route('dashboard.events.index')->with('success', 'Event berhasil diperbarui!');
    }
}
