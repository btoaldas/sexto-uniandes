import { Component, OnInit } from '@angular/core';
import { IAutor } from '../Interfaces/iautor'; // Asegúrate de tener esta interfaz
import { AutoresService } from '../Services/autores.service'; // Servicio para manejar autores
import Swal from 'sweetalert2';
import { Router } from '@angular/router';

@Component({
  selector: 'app-autores',
  templateUrl: './autores.component.html',
  styleUrls: ['./autores.component.scss']
})
export class AutoresComponent implements OnInit {
  autores: IAutor[] = [];


  constructor(private autoresService: AutoresService, private router: Router) {}


  ngOnInit(): void {
    this.cargarAutores(); // Cargar autores cuando el componente se inicializa
  }

  // Cargar todos los autores
  cargarAutores(): void {
    this.autoresService.todos().subscribe((data: IAutor[]) => {
      this.autores = data;
    });
  }

  // **Función para agregar un nuevo autor**
  insertar(): void {
    // Aquí puedes redirigir a un formulario o abrir un modal para crear un nuevo autor
    Swal.fire('Formulario para agregar autor'); 
  }

  // **Función para editar un autor**
  actualizar(autor: IAutor): void {
    // Aquí puedes redirigir a un formulario o abrir un modal para editar el autor
    Swal.fire(`Editar autor: ${autor.nombre} ${autor.apellido}`);
  }

  // **Función para eliminar un autor**
  eliminar(id: number): void {
    Swal.fire({
      title: '¿Estás seguro?',
      text: 'Esta acción eliminará al autor',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Sí, eliminar',
      cancelButtonText: 'Cancelar',
    }).then((result) => {
      if (result.isConfirmed) {
        this.autoresService.eliminar(id).subscribe(() => {
          Swal.fire('Eliminado', 'El autor ha sido eliminado', 'success');
          this.cargarAutores(); // Recargar la lista de autores
        });
      }
    });
  }

// Generar reporte
generarReporte() {
  Swal.fire('Reporte Generando !!', 'Por favor abra la nueva ventana.', 'info');
  window.open('http://localhost/sexto-uniandes/examen2/backend/reports/autores.report.php', '_blank');
}


// Para agregar nuevo autor
agregarAutor() {
  this.router.navigate(['/nuevoautor']);
}

// Para editar autor
editarAutor(id: number) {
  this.router.navigate(['/nuevoautor', id]);
}


}
