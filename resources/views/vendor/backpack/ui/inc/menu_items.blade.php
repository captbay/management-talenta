{{-- This file is used for menu items by any Backpack v6 theme --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<x-backpack::menu-item title="Bidang i is" icon="la la-question" :link="backpack_url('bidang-i-i')" />
<x-backpack::menu-item title="Users" icon="la la-question" :link="backpack_url('user')" />
<x-backpack::menu-item title="Dosens" icon="la la-question" :link="backpack_url('dosen')" />
<x-backpack::menu-item title="Kepala urusan sumber dayas" icon="la la-question" :link="backpack_url('kepala-urusan-sumber-daya')" />
<x-backpack::menu-item title="Ketua kelompok keahlians" icon="la la-question" :link="backpack_url('ketua-kelompok-keahlian')" />
<x-backpack::menu-item title="Ketua program studis" icon="la la-question" :link="backpack_url('ketua-program-studi')" />
<x-backpack::menu-item title="Pegawais" icon="la la-question" :link="backpack_url('pegawai')" />