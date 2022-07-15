<div class="card">
    <div class="card-header">
        <h5 class="card-header-title">Profile</h5>
    </div>
    <div class="card-body">
        <ul class="list-unstyled list-unstyled-py-3 text-dark mb-3">
            <li class="py-0">
                <small class="card-subtitle">About</small>
            </li>
            <li>
                <i class="tio-user-outlined nav-icon"></i>
                {{ $user->name }}
            </li>
            <li class="pt-2 pb-0">
                <small class="card-subtitle">Contacts</small>
            </li>
            <li>
                <i class="tio-online nav-icon"></i>
                {{ $user->email }}
            </li>
            <li>
                <i class="tio-android-phone-vs nav-icon"></i>
                {{ $user->phone }}
            </li>

            <li class="pt-2 pb-0">
                <small class="card-subtitle">Address</small>
            </li>

            <li>
                <i class="tio-briefcase-outlined nav-icon"></i>
                {{ $user->address }}
            </li>
            <li class="pt-2 pb-0">
                <small class="card-subtitle">Country</small>
            </li>

            <li>
                <i class="tio-briefcase-outlined nav-icon"></i>
                {{ strtoupper($user->country) }}
            </li>
            <hr>
            <li class="pt-2 pb-0">
                <small class="card-subtitle">Gross Total Refund</small>
            </li>

            <li>
                <i class="tio-money nav-icon"></i>
                0
            </li>
            <li class="pt-2 pb-0">
                <small class="card-subtitle">Total Refund DUE</small>
            </li>

            <li>
                <i class="tio-money nav-icon"></i>
                0
            </li>
        </ul>
    </div>
</div>
