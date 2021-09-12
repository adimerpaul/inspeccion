export default function () {
  return {
    status: '',
    token: localStorage.getItem('tokenins') || '',
    user : {},
    pedido:[],
    booluser:false,
    boolregistro:false,
    boolhistorial:false,
    // booldoctor:false,
    // boolpacientes:false,
    // boolhistorial:false,
    // boolreactivo:false,
    // boolporcaducar:false,
  }
}
