{{ $slot }}
<form action={{ route('site.contato') }} method="POST">
    @csrf
    <input type="text" name="nome" placeholder="Nome" class={{ $classe }} id="contact-input">
    <br>
    <input type="text" name="telefone" placeholder="Telefone" class={{ $classe }} id="contact-input">
    <br>
    <input type="email" name="email" placeholder="E-mail" class={{ $classe }} id="contact-input">
    <br>
    <select name="motivo_contato" class={{ $classe }} id="contact-input">
        <option value="">Qual o motivo do contato?</option>
        <option value="1">Dúvida</option>
        <option value="2">Elogio</option>
        <option value="3">Reclamação</option>
    </select>
    <br>
    <textarea name="mensagem" class={{ $classe }} id="contact-input" placeholder="Preencha aqui a sua mensagem"></textarea>
    <br>
    <button type="submit" class={{ $classe }} id="contact-btn">ENVIAR</button>
</form>

<div style="position: absolute; top: 0px; left:0px; width:100%; background: red;">
    <pre>
        {{ print_r($errors) }}
    </pre>
</div>