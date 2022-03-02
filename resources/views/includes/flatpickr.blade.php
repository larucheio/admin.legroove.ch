<script type="text/javascript">
    flatpickr('{{ $element }}', {
        altInput: true,
        altFormat: '{{ isset($time) && $time ? 'D d M Y à H:i' : 'D d M Y' }}',
        time_24hr: true,

        @if (isset($time) && $time)
            enableTime: true,
        @endif

        @if (isset($bookingLimitations))
            minDate: '{{ $bookingLimitations['min'] }}',
            maxDate: '{{ $bookingLimitations['max'] }}',

            @if (isset($bookingLimitations['disabled']))
                disable: ['{!! implode("','", $bookingLimitations['disabled']) !!}'],
            @endif
        @endif
    })
</script>
