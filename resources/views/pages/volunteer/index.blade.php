@extends('layouts.main')
@section('container')
@auth
<a href="{{ route('volunteer.create') }}" class="bg-lime-500 hover:bg-lime-700 px-4 py-1 text-white rounded-md shadow-md">
    + Tambah
</a>
<a href="{{ route('logout') }}" class="bg-red-500 hover:bg-red-700 px-4 py-1 text-white rounded-md shadow-md">
    Logout
</a>
@endauth
@guest
<a href="{{ route('login') }}" class="bg-tosca-500 hover:bg-tosca-700 px-4 py-1 text-white rounded-md shadow-md">
    Login
</a>
@endguest
<div class="mt-6">
    <table class="mt-6 shadow-md sm:rounded-lg text-center w-full text-sm text-left rtl:text-right text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th scope="col" class="hidden sm:table-cell px-6 py-3">
                    Nama
                </th>
                <th scope="col" class="hidden sm:table-cell px-6 py-3">
                    Fakultas
                </th>
                <th scope="col" class="hidden sm:table-cell px-6 py-3">
                    Poin
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $item)
            <tr class="odd:bg-white even:bg-gray-50 border-b">
                <td class="px-6 py-4 hidden sm:table-cell">
                    {{ $item->name }}
                </td>
                <td class="px-6 py-4 hidden sm:table-cell">
                    {{ $item->faculty }}
                </td>
                <td class="px-6 py-4 hidden sm:table-cell">
                    Poin
                </td>
            </tr>
                
            @endforeach
        </tbody>
    </table>
</div>

@endsection