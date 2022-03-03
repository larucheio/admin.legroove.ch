@extends('layouts.main')

@section('content')
    <div class="container-fluid">
        <section>
            <h1 class="h6 lead">Emails</h1>

            <form action="{{ route('emails.update') }}" method="post" class="row g-3">
                @csrf

                @foreach ($emails as $email)
                    <div>
                        <p>
                            <b>{{ $email->identifier }}</b>
                            <br>
                            {{ $email->description }}
                        </p>
                        <input type="hidden" name="id[]" value="{{ $email->id }}">
                        <div class="mb-3">
                            <label for="subject_{{ $email->id }}" class="form-label">Sujet</label>
                            <input type="text" class="form-control" id="subject_{{ $email->id }}" value="{{ $email->subject}}" name="subject[]" required>
                        </div>
                        <div class="mb-3">
                            <label for="body" class="form-label">Corps</label>
                            <textarea class="form-control" id="body_{{ $email->id }}" rows="5" name="body[]" required>{{ $email->body }}</textarea>
                        </div>

                        @if (!$loop->last)
                            <hr class="my-5">
                        @endif
                    </div>
                @endforeach

              <div class="col-12">
                  <button type="submit" class="btn btn-primary">Enregistrer</button>
              </div>
            </form>
        </section>
    </div>
@endsection
