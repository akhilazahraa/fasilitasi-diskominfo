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

class EventController extends Controller
{
    protected $pdf;
    public function __construct(PDF $pdf)
    {
        $this->pdf = $pdf;
    }

    public function index()
    {
        $events = Event::with('instansi')->get();
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
            'isp_id' => 'required',
            'kebutuhan' => 'nullable',
            'status' => 'nullable',
            'tim' => 'required|array',
            'tim.*' => 'exists:tims,id',
        ]);

        $event = Event::create($validatedData);

        $event->tims()->attach($request->input('tim'));

        $message = "Halo *{$event->instansi->name}*,\n\n" .
            "Kami ingin memberitahukan bahwa akan ada fasilitasi *{$event->name}* di OPD Anda mulai tanggal *{$event->start}*. Harap mempersiapkan segala sesuatunya untuk acara tersebut.\n\n" .
            "Mohon tidak membalas pesan ini karena terkirim secara otomatis melalui sistem. Demikian yang dapat disampaikan, atas perhatian dan kerjasamanya kami ucapkan terimakasih\n\n" .
            "*Hormat kami,*\n" .
            "*Magang UNDIP*";

        $this->sendWhatsappNotification($message);

        return redirect()->route('dashboard.events.index')->with('success', 'Acara berhasil ditambahkan!');
    }

    public function sendWhatsappNotification($message)
    {
        $client = new Client();
        $url = "https://api.fonnte.com/send";
        $phone = '6287810615021';

        try {
            $response = $client->post($url, [
                'form_params' => [
                    'target' => $phone,
                    'message' => $message,
                ],
                'headers' => [
                    'Authorization' => 'L!D5tg8AH4xPGk7KJ1zg'
                ],
                'verifiy' => false,
            ]);
        } catch (\Exception $e) {
            Log::error('Gagal mengirim pesan WhatsApp: ' . $e->getMessage());
        }
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
        $events = Event::with('instansi')->get();
        $pdf = $this->pdf->loadView('dashboard.events.pdf', ['events' => $events]);
        return $pdf->stream('events.pdf');
    }

    public function apiEvents()
    {
        $events = Event::with('instansi')->get();
        return response()->json($events);
    }

    public function filterOPD($opd_id)
    {
        $instansi = Instansi::findOrFail($opd_id);
        $events = Event::where('opd_id', $opd_id)->with('instansi')->get();

        return view('dashboard.events.filter.index', [
            'title' => 'Fasilitasi | Acara - ' . $instansi->name,
            'events' => $events,
            'opd_id' => $opd_id,
        ]);
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

    public function exportFilterPdf($opd_id)
    {
        $events = Event::where('opd_id', $opd_id)->with('instansi')->get();
        $instansi = Instansi::findOrFail($opd_id);
        $pdf = $this->pdf->loadView('dashboard.events.filter.pdf', ['events' => $events, 'instansi' => $instansi]);
        return $pdf->stream('filter_events.pdf');
    }

    public function exportFilterIspPdf($isp_id)
    {
        $events = Event::where('isp_id', $isp_id)->with('providers')->get();
        $providers = Provider::findOrFail($isp_id);
        $pdf = $this->pdf->loadView('dashboard.events.filter.pdf', ['events' => $events, 'providers' => $providers]);
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
        $events = Event::with('tims', 'instansi')->findOrFail($id);
        $tims = Tim::all();

        return view('dashboard.events.details.index', [
            'title' => 'Fasilitasi Acara | Detail Events',
            'events' => $events,
            'tims' => $tims,
        ]);
    }

    public function exportSingleEventPdf($id)
    {
        $event = Event::with('instansi', 'providers','tims')->findOrFail($id);
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
            'isp' => 'required',
            'kebutuhan' => 'nullable',
            'status' => 'nullable',
            'tim' => 'required|array',
            'tim.*' => 'exists:tims,id',
            'kebutuhan' => 'nullable',
            'status' => 'nullable',
        ]);

        $event = Event::findOrFail($id);

        $event->update($validatedData);

        return redirect()->route('dashboard.events.index')->with('success', 'Event berhasil diperbarui!');
    }
}
