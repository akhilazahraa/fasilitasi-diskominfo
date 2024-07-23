@extends('layouts.admin')
@section('container')

    <div>
        <div class="heading mb-4">
            <h1 class="fs-3 fw-bold">Scheduled Events</h1>
        </div>
    </div>
    <div class="content-wrapper">
        <div class="card border">
            <table class="table">
                <div class="container-wrapper">
                    <!--Button-->
                    <div class="container">
                        <button type="button" class="btn btn-primary ">Upcoming</button>
                        <button type="button" class="btn btn-secondary">Past</button>
                    </div>
                </div>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Workshop Cyber Security CNN Indonesia</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

@endsection
