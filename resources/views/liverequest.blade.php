<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Mahasiswa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in as Mahasiswa! <br>
                    Nama: {{\Illuminate\Support\Facades\Auth::user()->name}} <br>
                    Email: {{\Illuminate\Support\Facades\Auth::user()->email}} <br>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div>
                        <table class="shadow-lg bg-auto">
                            <tr>
                                <th class="bg-blue-100 border text-left px-8 py-4">Kode Mata Kuliah</th>
                                <th class="bg-blue-100 border text-left px-8 py-4">Mata Kuliah</th>
                                <th class="bg-blue-100 border text-left px-8 py-4">Created At</th>
                                <th class="bg-blue-100 border text-left px-8 py-4">Updated At</th>
                                <th class="bg-blue-100 border text-left px-8 py-4">Requested Seats</th>
                                <th class="bg-blue-100 border text-left px-8 py-4">Status Request</th>
                                <th class="bg-blue-100 border text-left px-8 py-4">Action</th>
                            </tr>
                            @foreach($lr2 as $m)
                                <tr>
                                    <td class="border px-8 py-4">{{ $m->k_mk }}</td>
                                    <td class="border px-8 py-4">{{ $m->mk }}</td>
                                    <td class="border px-8 py-4">{{ $m->created_at }}</td>
                                    <td class="border px-8 py-4">{{ $m->updated_at }}</td>
                                    <td class="border px-8 py-4">{{ $m->request_seats }}</td>
                                    <td class="border px-8 py-4">
                                        @if($m->status_request == 0)
                                            PENDING
                                        @elseif($m->status_request == 1)
                                            APPROVED
                                        @else
                                            REJECTED
                                        @endif
                                    </td>
                                    <td class="border px-8 py-4">
                                        @if($m->status_request == 0)
                                        <button type="button" class="btn btn-danger"><a href="{{ url("dashboard/cancel",$m->id) }}">Cancel</a></button>
                                        @elseif($m->status_request == 2)
                                            <button type="button" class="btn btn-primary"><a href="{{ url("dashboard/requestagain",$m->id) }}">Request Again</a></button>
                                        @else
                                            <button type="button" class="btn btn-primary" disabled><a href="{{ url("dashboard/requestagain",$m->id) }}">Request Again</a></button>
                                        @endif
                                    </td>
                                </tr>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
