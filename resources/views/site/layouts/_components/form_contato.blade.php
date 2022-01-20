{{ $slot }}
<form action={{ route('site.contato') }} method="POST">
    @csrf
    <input type="text" name="nome" value="{{ old('nome') }}" placeholder="Nome" class={{ $classe }} id="contact-input">
    @if ($errors->has('nome'))
        <br>
        <small>{{ $errors->first('nome') }}</small>
    @endif
    <br>
    <input type="text" name="telefone" value="{{ old('telefone') }}" placeholder="Telefone" class={{ $classe }} id="contact-input">
    @if ($errors->has('telefone'))
        <br>
        <small>{{ $errors->first('telefone') }}</small>
    @endif
    <br>
    <input type="email" name="email" value="{{ old('email') }}" placeholder="E-mail" class={{ $classe }} id="contact-input">
    @if ($errors->has('email'))
        <br>
        <small>{{ $errors->first('email') }}</small>
    @endif
    <br>
    <select name="motivo_contatos_id" class={{ $classe }} id="contact-input">
        <option value="">Qual o motivo do contato?</option>
        @foreach($motivo_contatos as $key => $motivo)
            <option value="{{$motivo->id}}" {{ old('motivo_contatos_id') == $motivo->id ? 'selected' : ''}}>{{$motivo->motivo_Contato}}</option>
        @endforeach
    </select>
    @if ($errors->has('motivo_contatos_id'))
        <br>
        <small>{{ $errors->first('motivo_contatos_id') }}</small>
    @endif
    <br>
    <textarea name="mensagem" class={{ $classe }} id="contact-input" placeholder="Preencha aqui a sua mensagem">{{ old('mensagem') }}</textarea>
    @if ($errors->has('mensagem'))
        <br>
        <small>{{ $errors->first('mensagem') }}</small>
    @endif
    <br>
    <button type="submit" class={{ $classe }} id="contact-btn">ENVIAR</button>
</form>