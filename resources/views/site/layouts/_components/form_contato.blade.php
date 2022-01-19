{{ $slot }}
<form action={{ route('site.contato') }} method="POST">
    @csrf
    <input type="text" name="nome" value="{{ old('nome') }}" placeholder="Nome" class={{ $classe }} id="contact-input">
    <br>
    <input type="text" name="telefone" value="{{ old('telefone') }}" placeholder="Telefone" class={{ $classe }} id="contact-input">
    <br>
    <input type="email" name="email" value="{{ old('email') }}" placeholder="E-mail" class={{ $classe }} id="contact-input">
    <br>
    <select name="motivo_contato" class={{ $classe }} id="contact-input">
        <option value="">Qual o motivo do contato?</option>
        @foreach($motivo_contatos as $key => $motivo)
            <option value="{{$motivo->id}}" {{ old('motivo_contato') == $motivo->id ? 'selected' : ''}}>{{$motivo->motivo_Contato}}</option>
        @endforeach
    </select>
    <br>
    <textarea name="mensagem" class={{ $classe }} id="contact-input" placeholder="Preencha aqui a sua mensagem">{{ old('mensagem') }}</textarea>
    <br>
    <button type="submit" class={{ $classe }} id="contact-btn">ENVIAR</button>
</form>