@php
    use Carbon\Carbon;
@endphp
@extends('layouts.main')
@section('container')

    <div class="max-w-lg mx-auto px-8 mt-6">
        @if ($donations->count() > 0)
            @if ($donations->contains('id', session('donation')))
                @php
                    $donation = $donations->find(session('donation'));
                @endphp

                <h1 class="text-center text-xl font-bold text-tosca">BBJ X {{ $donation->sponsor()->name }}</h1>
                <h1 class="text-center text-tosca text-xs italic font-semibold rounded-md mt-2">
                    {{ Carbon::parse($donation->take)->isoFormat('dddd, DD MMMM Y') }}</h1>
                <div class="w-full rounded-lg bg-tosca mt-8 py-5 px-6">
                    <h1 class="text-xl text-white text-center italic">Terimakasih telah menjadi heroes hari ini
                    </h1>
                    @if ($donation->sponsor()->id == 1)
                        <h1 class="text-center text-xs">
                            *satu orang akan mendapatkan 1 roti
                        </h1>
                    @endif
                    <h1 class="text-3xl text-white font-medium text-center italic my-4">
                        {{ implode(' ', str_split(session('code'))) }}
                    </h1>
                    <a href="{{ route('hero.cancel') }}">
                        <div class="m-auto bg-red-600 hover:bg-red-800 w-max rounded-md p-2 text-white">
                            Batalkan
                        </div>
                    </a>
                    <h1 class="text-xs text-white text-center italic mt-1">tunjukkan untuk menukarkan makanan</h1>
                    <h1 class="text-xs text-white text-center italic mt-3">ikuti instagram kami</h1>
                    <a href="https://www.instagram.com/berbagibitesjogja/"
                        class="text-xs text-center block text-white font-medium text-center italic">@berbagibitesjogja</a>
                </div>
                <div class="w-full rounded-lg bg-tosca mt-8 py-5 px-6">
                    <h1 class="text-md text-white font-medium text-center italic mb-4">Informasi take
                    </h1>
                    <a href="{{ $donation->maps }}"
                        class="text-center text-white text-md italic font-medium rounded-md mt-3"><svg class="inline"
                            xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                            <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6" />
                        </svg> {{ $donation->location }}</a>
                    <h1 class="text-white text-md italic font-medium rounded-md mt-3"><svg class="inline mr-1"
                            xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-clock-fill" viewBox="0 0 16 16">
                            <path
                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z" />
                        </svg>{{ $donation->hour }}.00 WIB</h1>
                </div>
            @else
                <div class="flex flex-row flex-wrap gap-3">
                    @foreach ($donations as $id => $donation)
                        <a href="#donatur{{ $id }}"
                            class="link-tab {{ $id == 0 ? 'bg-navy text-white' : 'text-navy' }} border-2 border-navy hover:bg-navy hover:text-white text-sm  p-2 rounded-md flex-grow text-center">
                            {{ $donation->sponsor()->name }}
                        </a>
                    @endforeach
                </div>
                <div class="p-4">
                    @foreach ($donations as $id => $donation)
                        <div id="donatur{{ $id }}" class="tab-content {{ $id != 0 ? 'hidden' : '' }}">
                            <h1 class="text-center text-xl font-bold text-tosca">BBJ X {{ $donation->sponsor()->name }}
                            </h1>
                            <h1 class="text-center text-tosca text-xs italic font-semibold rounded-md mt-2">
                                {{ Carbon::parse($donation->take)->isoFormat('dddd, DD MMMM Y') }}</h1>
                            @if ($donation->remain > 0)
                                <div class="w-full rounded-lg bg-white shadow-xl mt-4 py-5 px-6">
                                    <h1 class="text-lg text-tosca font-semibold text-center">RSVP Now</h1>
                                    <form action="{{ route('hero.store') }}" method="POST">
                                        @csrf
                                        <input type="number" name="donation" value="{{ $donation->id }}" class="hidden">
                                        <input autocomplete="off" type="text" name="name" id=""
                                            class="w-full mt-6 focus:outline-none"
                                            placeholder="Nama Lengkap" required>
                                        <div class="w-full h-px bg-black mt-1"></div>
                                        <div class="relative w-full">
                                            <span class="absolute left-0 bottom-0 text-slate-600">+62</span>
                                            <input autocomplete="off" type="number" name="phone" id=""
                                                class="w-full mt-6 pl-8 focus:outline-none"
                                                placeholder="Nomor Whatsapp" required>

                                        </div>
                                        <div class="w-full h-px bg-black mt-1"></div>
                                        @error('phone')
                                            <p class="text-xs italic font-thin text-pink-200">Silahkan masukkan format
                                                telepon yang
                                                benar</p>
                                        @enderror
                                        <select class="w-full text-slate-600 mt-6 focus:outline-none"
                                            placeholder="Nomor Whatsapp" name="faculty" required>
                                            <option value="">Fakultas</option>
                                            @foreach (App\Models\Faculty::all() as $item)
                                                @if (!in_array($item->name,["Kontributor","Lainnya"]) )
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        <div class="w-full h-px bg-navy mt-1"></div>
                                        <input type="submit" value="Submit"
                                            class="w-full bg-white rounded-md p-1 text-md font-bold mt-10 text-navy">
                                    </form>
                                </div>
                            @else
                                <div class="w-full rounded-lg bg-tosca mt-8 py-5 px-6">
                                    <h1 class="text-md text-white font-medium text-center italic">Mohon maaf quota telah
                                        terpenuhi, datang lagi lain waktu
                                    </h1>
                                    <h1 class="text-xs text-white font-medium text-center italic mt-3">ikuti instagram
                                        kami</h1>
                                    <a href="https://www.instagram.com/berbagibitesjogja/"
                                        class="text-xs text-center block text-white font-medium text-center italic">@berbagibitesjogja</a>
                                </div>
                            @endif
                            <h1 class="text-pink-900 text-md font-semibold text-center mt-4">Heroes</h1>
                            <h1 class="text-tosca text-2xl font-bold text-center mt-2">
                                {{ $donation->quota - $donation->remain }}/{{ $donation->quota }}</h1>
                        </div>
                    @endforeach
                </div>
            @endif
        @else
            <div class="w-full rounded-lg bg-tosca mt-8 py-5 px-6">
                <h1 class="text-xl text-white font-medium text-center italic">Maaf, belum ada food rescue hari ini</h1>
                <h1 class="text-md text-white font-medium text-center italic mt-3">ikuti instagram kami</h1>
                <a href="https://www.instagram.com/berbagibitesjogja/"
                    class="text-sm text-center block text-white font-medium text-center italic">@berbagibitesjogja</a>
            </div>
        @endif
    </div>

@endsection
