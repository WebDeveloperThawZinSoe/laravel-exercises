{{-- This file is used to store sidebar items, inside the Backpack admin panel --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<li class="nav-item"><a class="nav-link" href="{{ backpack_url('user') }}"><i class="nav-icon la la-question"></i> Users</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('contact') }}"><i class="nav-icon la la-question"></i> Contacts</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('sender') }}"><i class="nav-icon la la-question"></i> Senders</a></li>