@section('contact')
  <section id="contact" class="contact-padding contact-center">
    <div class="container">
      <div class="row justify-content-center border bg-white p-4">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mx-auto text-center">
          <h2 class="mb-4">Contact</h2>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mx-auto">
          <form id="contact_form" method="POST" action="{{ route('send_form') }}">
            {{ csrf_field() }}

            <div class="form-group">
              <label for="input_name">氏名</label>
              <input type="text" class="form-control" id="input_name" name="input_name" placeholder="山田　太郎" value="{{ old('input_name') }}">
              @if ($errors->has('input_name'))
                <span class="help-block">
                  <strong>{{ $errors->first('input_name') }}</strong>
                </span>
              @endif
            </div>

            <div class="form-group">
              <label for="input_phonetic">フリガナ</label>
              <input type="text" class="form-control" id="input_phonetic" name="input_phonetic" placeholder="ヤマダ　タロウ" value="{{ old('input_phonetic') }}">
              @if ($errors->has('input_phonetic'))
                <span class="help-block">
                  <strong>{{ $errors->first('input_phonetic') }}</strong>
                </span>
              @endif
            </div>

            <div class="form-group">
              <label for="input_email">Eメールアドレス</label>
              <input type="email" class="form-control" id="input_email" name="input_email" placeholder="name@example.com" value="{{ old('input_email') }}">
              @if ($errors->has('input_email'))
                <span class="help-block">
                  <strong>{{ $errors->first('input_email') }}</strong>
                </span>
              @endif
            </div>

            <div class="form-group">
              <label for="input_tel">電話番号</label>
              <input type="tel" class="form-control" id="input_tel" name="input_tel" placeholder="1234-56-7891" value="{{ old('input_tel') }}">
              @if ($errors->has('input_tel'))
                <span class="help-block">
                  <strong>{{ $errors->first('input_tel') }}</strong>
                </span>
              @endif
            </div>

            <div class="form-group">
              <label for="input_subject">件名</label>
              <input type="text" class="form-control" id="input_subject" name="input_subject" placeholder="○○について" value="{{ old('input_subject') }}">
              @if ($errors->has('input_subject'))
                <span class="help-block">
                  <strong>{{ $errors->first('input_subject') }}</strong>
                </span>
              @endif
            </div>

            <div class="form-group">
              <label for="input_message">お問合せ内容</label>
              <textarea class="form-control" id="input_message" name="input_message" rows="15" placeholder="お問合せ内容をご記載下さい。" value="{{ old('input_message') }}">{{ old('input_message') }}</textarea>
              @if ($errors->has('input_message'))
                <span class="help-block">
                  <strong>{{ $errors->first('input_message') }}</strong>
                </span>
              @endif
            </div>

            <button type="submit" class="btn btn-primary">送信</button>
          </form>
        </div>
      </div>
    </div>
  </section>
@endsection
