import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { ILibro } from '../../Interfaces/ilibro';  
import { LibrosService } from '../../Services/libros.service';  
import { AutoresService } from '../../Services/autores.service';  
import { IAutor } from '../../Interfaces/iautor';  
import Swal from 'sweetalert2';

@Component({
  selector: 'app-nuevolibro',
  templateUrl: './nuevolibro.component.html',
  styleUrls: ['./nuevolibro.component.scss']
})
export class NuevoLibroComponent implements OnInit {
  libro: ILibro = {
    titulo: '',
    autor_id: 0,  // Permitir autor_id sin validación obligatoria
    fecha_publicacion: '',
    genero: '',
    isbn: 0
  };
  autores: IAutor[] = [];
  idLibro: number = 0;
  titulo = 'Insertar/Editar Libro';

  constructor(
    private librosService: LibrosService,
    private autoresService: AutoresService,
    private ruta: ActivatedRoute,
    private router: Router
  ) {}

  ngOnInit(): void {
    this.idLibro = parseInt(this.ruta.snapshot.paramMap.get('id') || '0');
    
    if (this.idLibro > 0) {
      this.titulo = 'Editar Libro';
      this.librosService.uno(this.idLibro).subscribe((data: ILibro) => {
        this.libro = data;
      });
    } else {
      this.titulo = 'Nuevo Libro';
    }

    // Obtener la lista de autores
    this.autoresService.todos().subscribe((data: IAutor[]) => {
      this.autores = data;
    });
  }

  grabar(libroForm: any) {
    if (libroForm.invalid) {
      Swal.fire({
        icon: 'error',
        title: 'Error',
        text: 'Por favor, complete todos los campos obligatorios correctamente.'
      });
      return;
    }

    if (this.idLibro > 0) {
      this.librosService.actualizar(this.libro).subscribe((res: any) => {
        Swal.fire('Actualizado el Libro', res.mensaje, 'success');
        this.router.navigate(['/libros']);
      });
    } else {
      this.librosService.insertar(this.libro).subscribe((res: any) => {
        Swal.fire('Libro insertado con éxito', res.mensaje, 'success');
        this.router.navigate(['/libros']);
      });
    }
  }
}
