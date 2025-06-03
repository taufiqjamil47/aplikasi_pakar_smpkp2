@if (isset($error))
    <div>
        <h2>Error:</h2>
        <p>{{ $error }}</p>
    </div>
@else
    @isset($text)
        <div>
            <h2>Hasil OCR:</h2>
            <p>{{ $text }}</p>
        </div>
    @endisset
@endif
