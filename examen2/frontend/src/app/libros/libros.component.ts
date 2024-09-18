import { Component, OnInit } from '@angular/core';
import { ILibro } from '../Interfaces/ilibro'; // Asegúrate de tener esta interfaz
import { LibrosService } from '../Services/libros.service'; // Servicio para manejar libros
import Swal from 'sweetalert2';
import { Router } from '@angular/router';

@Component({
  selector: 'app-libros',
  templateUrl: './libros.component.html',
  styleUrls: ['./libros.component.scss']
})
export class LibrosComponent implements OnInit {
  libros: ILibro[] = [];

  constructor(private librosService: LibrosService, private router: Router) {}

  ngOnInit(): void {
    this.cargarLibros(); // Cargar libros cuando el componente se inicializa
  }

  // Cargar todos los libros
  cargarLibros(): void {
    this.librosService.todos().subscribe((data: ILibro[]) => {
      this.libros = data;
    });
  }

  // **Función para agregar un nuevo libro**
  insertar(): void {
    this.router.navigate(['/nuevolibro']);
  }

  // **Función para editar un libro**
  actualizar(libro: ILibro): void {
    this.router.navigate(['/nuevolibro', libro.libro_id]);
  }

  // **Función para eliminar un libro**
  eliminar(id: number): void {
    Swal.fire({
      title: '¿Estás seguro?',
      text: 'Esta acción eliminará el libro',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Sí, eliminar',
      cancelButtonText: 'Cancelar',
    }).then((result) => {
      if (result.isConfirmed) {
        this.librosService.eliminar(id).subscribe(() => {
          Swal.fire('Eliminado', 'El libro ha sido eliminado', 'success');
          this.cargarLibros(); // Recargar la lista de libros
        });
      }
    });
  }

  // Generar reporte de libros
  generarReporte() {
    Swal.fire('Reporte Generando !!', 'Por favor abra la nueva ventana.', 'info');
    window.open('http://localhost/sexto-uniandes/examen2/backend/reports/libros.report.php', '_blank');
  }
}
