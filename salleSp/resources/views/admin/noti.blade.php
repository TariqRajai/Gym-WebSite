    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
        <i class="fa fa-bell me-lg-2"></i>
        <span class="d-none d-lg-inline-flex">Notification</span>
        @if ($newClients->count() > 0 && !session('notification_seen'))
            <span id="notification-badge" class="badge bg-danger">{{ $newClients->count() }}</span>
        @endif
    </a>
    <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
        @if ($newClients->count() > 0)
            @php $notificationCount = 0; @endphp
            @foreach ($newClients as $client)
                @php $notificationCount++; @endphp
                <a href="#" class="dropdown-item">
                    <h6 class="fw-normal mb-0;"style="color:white;">New user signed up</h6>
                    @if ($client->compte)
                        <small>{{ $client->compte->email }}</small>
                    @endif
                </a>
                @if ($notificationCount === 4)
                    @break
                @endif
                <hr class="dropdown-divider">
            @endforeach
        @else
            <a href="#" class="dropdown-item" style="color:white;">No new notifications</a>
        @endif
        <a href="{{'notifications'}}" class="dropdown-item text-center" style="color:white;">See all notifications</a>
    </div>
    <script>

        
    //////////////////////notification
    document.addEventListener('DOMContentLoaded', function () {
        // Check if notification has been seen and hide the badge if so
        if (sessionStorage.getItem('notification_seen')) {
            document.getElementById('notification-badge').style.display = 'none';
        }

        // Save notification status to session storage when badge is clicked
        var notificationBadge = document.getElementById('notification-badge');
        if (notificationBadge) {
            notificationBadge.addEventListener('click', function () {
                sessionStorage.setItem('notification_seen', true);
                notificationBadge.style.display = 'none';
            });
        }
    });
    </script>