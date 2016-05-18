
<section id="SC_Promociones" ng-init="Consultar_Promociones()" ng-if="dato.AOBJ_Datos_Usuario[0].FK_ID_Rol == 3 || dato.AOBJ_Datos_Usuario[0].FK_ID_Rol == 5 ">
  <div id="CONT_Promociones">
    <div class="CL_Alerta_5 Titulo_Promociones_TBL">Promociones</div>
    <div id="CONT_Lista_Promociones">
      <table>
        <thead>
          <tr class="CL_TH_Cabezera_Tbl">
            <th>Nombre </th>
            <th class="TH_Descripcion">Descripci&oacuten</th>
          </tr>
        </thead>
        <tbody>
          <tr ng-repeat="Promociones in AOBJ_Consultar_Promociones">
            <th class="CL_TH">{{Promociones.Nombre_Promocion}}
              <th class="CL_TH TH_Descripcion">{{Promociones.Descripcion}}</th>
            </th>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</section>	<style>
 #SC_Promociones
 {
 	background-color: #eee;
 	position: fixed;
 	right: 0px;
 	height: 400px;
 	width: 400px;
	overflow: auto;
 }
.CL_TH{
	font-size:75%;
}
.CL_TH_Cabezera_Tbl{
	color:green;
	font-family: gabriola;
	font-size: 160%;
  display: flex;
  justify-content: space-between;
}
.TH_Descripcion{
	margin-left: 28%;
position: absolute;
}
</style>