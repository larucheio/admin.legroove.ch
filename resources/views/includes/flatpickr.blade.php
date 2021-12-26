<script type="text/javascript">
    flatpickr('{{ $element }}', {
        minDate: '{{ $bookingLimitations['min'] }}',
        maxDate: '{{ $bookingLimitations['max'] }}',
        @if (isset($bookingLimitations['disabled']))
            disable: ['{!! implode("','", $bookingLimitations['disabled']) !!}']
        @endif
    })
</script>
