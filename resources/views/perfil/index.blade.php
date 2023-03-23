<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
  <title>{{$informacion[0]->nombre}}</title>
 
  <!-- Incluye Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Incluye AOS CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
  <!-- Estilos personalizados -->
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f8f9fa;
    }

    .name {
      font-weight: 700;
      font-size: 2.5rem;
    }

    .title {
      font-weight: 300;
      font-size: 1.5rem;
      color: #6c757d;
    }

    .section-title {
      font-weight: 600;
      margin-bottom: 30px;
    }

    .section-item {
      margin-bottom: 20px;
    }

    .sidebar {
      background-color: #ffffff;
      box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.1);
      padding: 30px;
      position: sticky;
      top: 30px;
    }
  </style>
</head>
<body>
  <div class="container py-5">
    <div class="row">
      <div class="col-lg-4">
        @foreach($informacion as $items)
        <div class="sidebar">
          <h1 class="name">{{$items->nombre}}</h1>
          <h2 class="title">{{$items->profesion}}</h2>
          <h3>Contacto</h3>
          <ul class="list-unstyled">
            <li>Web: <a href="{{$items->pagina_web}}" target="_blank">{{$items->pagina_web}}</a></li>
            <li>Email:{{$items->email}}</li>
            <li>Teléfono: +57 {{$items->telefono}}</li>
          </ul>
          <h3>Idiomas</h3>
          <ul class="list-unstyled">
            <li>{{$items->idiomas->nombre}}</li>
          </ul>
        </div>
        @endforeach
      </div>
      <div class="col-lg-8">
        <div class="main">
          <div class="section" data-aos="fade-up" data-aos-duration="1000">
            @foreach($contenido as $item)
            <h2 class="section-title">Perfil</h2>
            <div class="section-item">
              <p>{!!$item->perfil!!}</p>
              @endforeach
        </div>
      </div>
          <div class="section" data-aos="fade-up" data-aos-duration="1000">
            <h2 class="section-title">Experiencia</h2>
            <div class="section-item">
              @foreach($experiencia as $item)
              <h3>{{$item->empresa}}</h3>
              <p>{{$item->cargo}} | {{$item->fecha_inicio}} - {{$item->fecha_final}}</p>
              <ul>
                <p>{!!$item->descripcion_del_cargo!!}</p>
            </ul>
            @endforeach
        </div>
      </div>
      <div class="section" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
        <h2 class="section-title">Educación</h2>
        <div class="section-item">
          @foreach($universidad as $item)
          <h3>{{$item->nombre_de_la_institucion}}</h3>
          <h4>{{$item->titulo}} | {{$item->fecha_inicio}} - {{$item->fecha_final}}</h4>
          @endforeach
        </div>
      </div>
      <div class="section" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
        <h2 class="section-title">Habilidades</h2>
        @foreach($habilidad as $item)
        <ul class="list-unstyled">
          <li>{{$item->nombre}}</li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
</div>
  <!-- Incluye Bootstrap y AOS JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

  <!-- Configura AOS -->
  <script>
    AOS.init();
  </script>
</body>
</html>

