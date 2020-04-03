{% extends 'templates/globals/main.php' %}
{% block neck %}
<link rel="stylesheet" href="{{ base_url() }}/css/parallax.css">
{% endblock %}
{% block breadcrumb %}
<div class="container-fluid">

      <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-dark mt-3 shadow">
          <li class="breadcrumb-item text-light">Inicio</li>
        </ol>
      </nav>

</div>
{% endblock %}
{% block content %}
<div class="container-fluid">
  <section id="parallax1">
    <h1 class="text-light">Business Analytics</h1>
  </section>
  <section id="parallax2">
  </section>
  <section id="parallax3">
    <h1 class="text-light">Business Inteligence</h1>
  </section>
</div>
{% endblock %}