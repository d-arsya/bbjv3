@php
    use Carbon\Carbon;
@endphp
@extends('layouts.main')
@section('container')
    
<div class="max-w-lg mx-auto px-8 mt-6">
    <div class="pt-12 h-screen bg-navy">
        {{-- ada  --}}
        <h1 class="text-center text-4xl font-bold text-white">Heroes</h1>
        <div class="w-full rounded-lg bg-tosca mt-8 py-5 px-6">
            <h1 class="text-2xl text-white font-semibold text-center">Let's Rescue</h1>
            <form action="{{ route('volunteer.authenticate') }}" method="POST">
                @csrf 
                    <input autocomplete="off" type="text" name="email" id="" class="bg-tosca w-full text-slate-100 mt-6 focus:outline-none" placeholder="email">
                    <div class="w-full h-px bg-navy mt-1"></div>
                    <input autocomplete="off" type="password" name="password" id="" class="bg-tosca w-full text-slate-100 mt-6 focus:outline-none" placeholder="Password">
                    <div class="w-full h-px bg-navy mt-1"></div>
                    <input type="submit" value="Let's go" class="w-full bg-white rounded-md p-1 text-lg font-bold mt-10 text-navy">
                </form>
            </div>
        </div>
    </div>
    
    @endsection