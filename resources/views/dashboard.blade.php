<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Admin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1>Tabel Request per Mata Kuliah</h1>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <button type="button" class="mr-3 text-sm bg-blue-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline"><a href="#">APPLY ALL</a></button>
                </div>
{{--                <div class="btn-group">--}}
{{--                    <button class="ml-2.5 mt-2 btn btn-primary " type="button">--}}
{{--                      Notifications: {{ $notifications }}--}}
{{--                    </button>--}}
{{--                    <button type="button" class="mt-2 btn btn-lg btn-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                      <span class="visually-hidden">Toggle Dropdown</span>--}}
{{--                    </button>--}}
{{--                    <ul class="dropdown-menu">--}}
{{--                    @foreach ($getmahasiswa as $requests)--}}
{{--                    <li><a class="dropdown-item" href={{ url('/dashboard/nameasrequest',$requests->id_mhs) }}>{{ $requests->name }} | {{ $requests->id_mhs }}</a></li>--}}
{{--                    @endforeach--}}
{{--                    </ul>--}}
{{--                  </div>--}}

                <div class="flex-auto">
                    <table class="w-full shadow-lg 2xl:bg-auto">
                        <tr>
                            <th class="bg-blue-100 border text-left px-8 py-4">Kode Mata Kuliah</th>
                            <th class="bg-blue-100 border text-left px-8 py-4">Mata Kuliah</th>
                            <th class="bg-blue-100 border text-left px-8 py-4">View Requests</th>
                            <th class="bg-blue-100 border text-left px-8 py-4">Requested Seats</th>
                            <th class="bg-blue-100 border text-left px-8 py-4">Status Request</th>
                            <th class="bg-blue-100 border text-left px-8 py-4">Action</th>
                        </tr>
                        @foreach($lr as $m)
                        <tr>
                            <td class="border px-8 py-4">{{ $m->k_mk }}</td>
                            <td class="border px-8 py-4">{{ $m->mk }}</td>
                            <td class="border px-8 py-4">
                                <button type="button" class="mr-3 text-sm bg-blue-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline"><a href="{{ url('dashboard/mkasrequest', $m->k_mk) }}">VIEW</a></button>
                            </td>
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
                                @if ($m->status_request == 0)
                                <button type="button" class="mr-3 text-sm bg-green-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline"><a href={{ url('/dashboard/approve',$m->id) }}>APPROVE</a></button>
                                <button type="button" class="mr-3 text-sm bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline"><a href="{{ url('dashboard/reject', $m->id) }}">REJECT</a></button>
                                @else
                                <button type="button" class="disabled:opacity-50 mr-3 text-sm bg-green-500 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline" disabled><a href="#">APPROVE</a></button>
                                <button type="button" class="disabled:opacity-50 mr-3 text-sm bg-red-500 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline" disabled><a href="#">REJECT</a></button>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
