<script type="text/javascript">
    @if (isset($bookingLimitations))
        flatpickr('{{ $element }}', {
            minDate: '{{ $bookingLimitations['min'] }}',
            maxDate: '{{ $bookingLimitations['max'] }}',
            @if (isset($bookingLimitations['disabled']))
                disable: ['{!! implode("','", $bookingLimitations['disabled']) !!}']
            @endif
        })
    @else
        flatpickr('{{ $element }}')
    @endif
</script>
