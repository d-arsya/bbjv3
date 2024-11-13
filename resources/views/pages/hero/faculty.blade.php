@extends('layouts.main')
@section('container')

<div class="flex gap-3 w-max">
    <a class="bg-orange-300 hover:bg-orange-500 shadow-md p-2 rounded-md text-white" href="{{ route('hero.index') }}">< Kembali</a>
    <div class="w-max bg-navy-500 py-2 px-4 text-white rounded-md shadow-md">
        Heroes : {{ $heroes->count() }} Orang
    </div>
</div>
<h1 class="text-center mt-6 font-bold text-xl">Daftar Heroes faculty {{ $heroes[0]->faculty }}</h1>
<div class="shadow-md sm:rounded-lg mt-3">
    <table class="text-center w-full text-sm text-left rtl:text-right text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3">
                    name
                </th>
                <th scope="col" class="hidden sm:table-cell px-6 py-3">
                    faculty
                </th>
                <th scope="col" class="hidden sm:table-cell px-6 py-3">
                    phone
                </th>
                <th scope="col" class="px-6 py-3">
                    Donasi
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($heroes as $item)
            <tr class="odd:bg-white even:bg-gray-50 border-b">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    {{ $item->name }}
                </th>
                <td class="px-6 py-4 hidden sm:table-cell">
                    <a href="{{ route('hero.faculty',$item->faculty) }}">
                        {{ $item->faculty }}
                    </a>
                    
                </td>
                <td class="px-6 py-4 hidden sm:table-cell">
                    {{ $item->phone }}
                    
                </td>
                <td class="px-6 py-4 flex flex-col">
                    @php
                        $donation = $item->donation();
                        $sponsor = $donation->sponsor();
                    @endphp
                    <a href="{{ route('sponsor.show',$sponsor->id) }}" class="block">
                        {{ $sponsor->name }}
                    </a>
                    <a href="{{ route('donation.show',$donation->id) }}" class="block">
                        {{ $donation->take }}
                    </a>
                    
                </td>
            </tr>
                
            @endforeach
        </tbody>
    </table>
</div>

@endsection