<div class="content">
    <div class="title">Something went wrong.</div>
    @unless(empty($sentryID))
        <!-- Sentry JS SDK 2.1.+ required -->
        <script src="https://cdn.ravenjs.com/3.3.0/raven.min.js"></script>

        <script>
        Raven.showReportDialog({
            eventId: '{{ $sentryID }}',

            // use the public DSN (dont include your secret!)
            dsn: 'https://d395d719101b46c4bef72a3a8c91f5e5@sentry.io/116934'
        });
        </script>
    @endunless
</div>