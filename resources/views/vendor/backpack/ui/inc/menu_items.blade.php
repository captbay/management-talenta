{{-- This file is used for menu items by any Backpack v6 theme --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i>
        {{ trans('backpack::base.dashboard') }}</a></li>

{{-- 
<x-backpack::menu-item title="Users" icon="las la-user" :link="backpack_url('user')" />
--}}

@php
    $user = backpack_auth()->user();
@endphp

@if ($user->role == 'Dosen')
    <x-backpack::menu-item title="Dosen" icon="las la-user" :link="backpack_url('dosen')" />
@elseif ($user->role == 'Kepala Urusan Sumber Daya')
    <x-backpack::menu-item title="Kepala urusan sumber daya" icon="las la-user" :link="backpack_url('kepala-urusan-sumber-daya')" />
@elseif ($user->role == 'Ketua Kelompok Keahlian')
    <x-backpack::menu-item title="Ketua kelompok keahlian" icon="las la-user" :link="backpack_url('ketua-kelompok-keahlian')" />
@elseif ($user->role == 'Ketua Program Studi')
    <x-backpack::menu-item title="Ketua program studi" icon="las la-user" :link="backpack_url('ketua-program-studi')" />
@elseif ($user->role == 'Pegawai')
    <x-backpack::menu-item title="Pegawai" icon="las la-user" :link="backpack_url('pegawai')" />
@elseif ($user->role == 'Bidang II')
    <x-backpack::menu-item title="Bidang II" icon="las la-user" :link="backpack_url('bidang-i-i')" />
    {{-- @elseif ($user->role == 'Admin')
<x-backpack::menu-item title="Users" icon="las la-user" :link="backpack_url('user')" /> --}}
@endif
