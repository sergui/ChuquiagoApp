<div class="row">
    <div class="col-md-6">
        <!--statistics start-->
        <div class="row state-overview">
            <div class="col-md-6 col-xs-12 col-sm-6">
                <div class="panel purple" onclick="dirigir('ventas/')">
                    <div class="symbol">
                        <i class="fa fa-gavel"></i>
                    </div>
                    <div class="state-value">
                        <div class="title" onclick="dirigir('ventas/')"><H3>VENTAS</H3></div>
                    </div>
                </div>
            </div>
            <?php if($_SESSION['rol']==1 || $_SESSION['rol']==0): ?>
            <div class="col-md-6 col-xs-12 col-sm-6">
                <div class="panel red" onclick="dirigir('producto/')">
                    <div class="symbol">
                        <i class="fa fa-tags"></i>
                    </div>
                    <div class="state-value">
                        <div class="title"><H4>PRODUCTOS REGISTRADOS</H4></div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
        <div class="row state-overview">
            <?php if($_SESSION['rol']==1 || $_SESSION['rol']==0): ?>
            <div class="col-md-6 col-xs-12 col-sm-6">
                <div class="panel blue">
                    <div class="symbol">
                        <i class="fa fa-money"></i>
                    </div>
                    <div class="state-value">
                        <div class="title"><H3>REPORTES</H3></div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <div class="col-md-6 col-xs-12 col-sm-6">
                <div class="panel green" onclick="dirigir('cliente/')">
                    <div class="symbol">
                        <i class="fa fa-eye"></i>
                    </div>
                    <div class="state-value">
                        <div class="title"> <H3>CLIENTES</H3></div>
                    </div>
                </div>
            </div>
        </div>
        <!--statistics end-->
    </div>
    <div class="col-md-6">
        <!--more statistics box start-->
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                          <div class="contenedor reloj1 " >
                              <div class="widget">
                                <div class="fecha">
                                  <p id="diaSemana" class="diaSemana"></p>
                                  <p id="dia" class="dia"></p>
                                  <p>de</p>
                                  <p id="mes" class="mes"></p>
                                  <p>del</p>
                                  <p id="anio" class="anio"></p>
                                </div>
                                <div class="reloj">
                                  <p id="horas" class="horas"></p>
                                  <p>:</p>
                                  <p id="minutos" class="minutos"></p>
                                  <p>:</p>
                                  <div class="cajaSegundos">
                                    <p id="ampm" class="ampm"></p>
                                    <p id="segundos" class="segundos"></p>
                                  </div>
                                </div>
                              </div>
                        </div>
                    </div>
            </div>
        </div>
        <!--more statistics box end-->
    </div>
</div>
<script>
    function dirigir(ruta){
        window.location.href='<?php echo ROOT_CONTROLLER; ?>'+ruta;
    }
</script>