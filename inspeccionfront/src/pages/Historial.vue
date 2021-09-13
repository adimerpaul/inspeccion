<template>
  <q-page class="q-pa-xs">
    <div class="row">
      <div class="col-12">
        <q-badge color="primary" label="Historial " class="text-h6 full-width" />
      </div>
      <div class="col-12">
        <q-select label="buscar historial" outlined :options="options" v-model="historial" @update:model-value="buscarhistorial" />
      </div>
      <div class="col-6 q-pa-xs">
        <q-input outlined label="area" v-model="area"/>
      </div>
      <div class="col-6 q-pa-xs">
        <q-input outlined label="subarea" v-model="subarea"/>
      </div>
      <div class="col-12">
        <table>
          <thead>
          <tr>
            <th>Lugar de instalacion/Tag</th>
            <th v-for="(p,i) in places" :key="i">{{p.nombre}}</th>
          </tr>
          <tr>
            <th></th>
            <th v-for="(p,i) in places" :key="i">{{p.codigo}}</th>
          </tr>
          <tr v-for="(s,i) in sensors" :key="i">
            <td>
              <!--            {{s.codigo}} -->
              {{s.codigo}} {{s.nombre}}
            </td>
            <template v-for="(d,i) in datos" :key="i">
              <td v-if="d.sensor_id==s.id">
                <!--              {{d}}-->
                <q-btn rounded flat :label="d.estado" :color="d.estado=='C'?'positive':'negative'" @click="d.estado=='N'?d.estado='C':d.estado='N'"/>
              </td>
            </template>

            <!--          <th v-for="(p,i) in places" :key="i">{{p.codigo}}</th>-->
          </tr>
          </thead>
        </table>
      </div>
      <div class="col-12">
<!--        <q-btn @click="crear" color="positive" icon="create" label="Crear" class="full-width" />-->
      </div>
    </div>
    <!--    <q-card>-->
    <!--      <q-table-->
    <!--        :columns="columns"-->
    <!--        :rows="rows"-->
    <!--      >-->
    <!--        <template v-slot:top-right>-->
    <!--          <q-input borderless dense debounce="300" v-model="filter" placeholder="Search">-->
    <!--            <template v-slot:append>-->
    <!--              <q-icon name="search" />-->
    <!--            </template>-->
    <!--          </q-input>-->
    <!--        </template>-->
    <!--      </q-table>-->
    <!--    </q-card>-->
  </q-page>
</template>

<script>
export default {
  data(){
    return{
      sensors:[],
      places:[],
      datos:[],
      area:'',
      subarea:'',
      options:[],
      historial:'',
      // rows:[],
      // columns:[
      //   { name: 'padron', label: 'padron', field: 'padron'},
      //   { name: 'paterno', label: 'paterno', field: 'paterno'},
      //   { name: 'materno', label: 'materno', field: 'materno'},
      //   { name: 'cedula', label: 'cedula', field: 'cedula'},
      //   { name: 'expedido', label: 'expedido', field: 'expedido'},
      //   { name: 'celular', label: 'celular', field: 'celular'},
      //   { name: 'direccion', label: 'direccion', field: 'direccion'},
      //   { name: 'telefono', label: 'telefono', field: 'telefono'},
      //   { name: 'tipo', label: 'tipo', field: 'tipo'},
      //   { name: 'action', label: 'action', field: 'action'},
      // ]
    }
  },
  created(){
    this.midato()
    // this.$q.loading.show()
    this.$axios.get(process.env.API+'/reporte').then(res=>{
      // console.log(res.data)
      res.data.forEach(r=>{
        this.options.push({
          id:r.id,
          label:r.fecha+' '+r.hora +' '+r.user.name+' '+r.area+' '+r.subarea,
          // id:r.id,

        })
      })
      // this.$q.loading.hide()
    })
  },
  methods:{
    buscarhistorial(value){
      // console.log(value)
      this.$q.loading.show()
      this.$axios.get(process.env.API+'/reporte/'+value.id).then(res=>{
        console.log(res.data)
        this.$q.loading.hide()
        this.area=res.data[0].area
        this.subarea=res.data[0].subarea
        this.datos=[]
        res.data.forEach(r=>{
          this.datos.push({sensor_id:r.sensor_id,place_id:r.place_id,estado:r.estado})
        })

      })
    },
    midato(){
      this.$q.loading.show()
      this.$axios.get(process.env.API+'/place').then(res=>{
        // console.log(res.data)
        this.places=res.data
        this.$axios.get(process.env.API+'/sensor').then(res=>{
          // console.log(res.data)
          this.sensors=res.data
          // res.data.forEach(r=>{
          //   // this.datos=[]
          //   // dat.nombre=r.nombre
          //   // dat.codigo=r.codigo
          //   this.places.forEach(r2=>{
          //     // dat.place_id=r2.id
          //     if (r.id==16 ||r.id==17)
          //       this.datos.push({sensor_id:r.id,place_id:r2.id,estado:'N'})
          //     else
          //       this.datos.push({sensor_id:r.id,place_id:r2.id,estado:'C'})
          //   })
            this.$q.loading.hide()
          //   // this.sensors.push(dat)
          // })
        })
      })
    },
    crear(){
      this.$q.loading.show()
      this.$axios.post(process.env.API+'/reporte',{
        area:this.area,
        subarea:this.subarea,
        datos:this.datos
      }).then(res=>{
        this.$q.loading.hide()
        this.$q.dialog({
          message:'Creado correctamente',
          icon:'success',
          color:'green'
        })
        // console.log(res.data)
      });
    }
  }
}
</script>
<style>
table, td, th {
  border: 1px solid black;
}

table {
  width: 100%;
  border-collapse: collapse;
}
</style>
