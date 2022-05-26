<div class="col-md-4 mt-4">
                            <div class="card shadow">
                                <img src="/storage/{{$receta->imagen}}" alt="Imagen Receta" class="card-img-top">
                                <div class="card-body">
                                    <h3 class="card-tittle">{{$receta->titulo}}</h3>
                                    <div class="receta-meta d-flex justify-content-between">
                                        @php
                                        $fecha = $receta->created_at
                                        @endphp
                                        <p class="text-primary fecha">
                                            <fecha-receta fecha="{{$fecha}}"></fecha-receta>
                                        </p>

                                        <p>A {{count($receta->likes)}} les gusto</p>

                                    </div>

                                    <p> {{ Str::words(strip_tags($receta->preparacion), 10)}} </p>
                                    <a href="{{route('recetas.show', ['receta' => $receta->id])}}" class="btn btn-primary d-block font-weight-bold uppercase">Ver Receta</a>

                                </div>
                            </div>
                        </div>
