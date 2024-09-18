import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { IAutor } from '../../Interfaces/iautor';  // Asegúrate de tener esta interfaz
import { AutoresService } from '../../Services/autores.service';  // Servicio para interactuar con la API de autores
import Swal from 'sweetalert2';

@Component({
  selector: 'app-nuevoautor',
  templateUrl: './nuevoautor.component.html',
  styleUrls: ['./nuevoautor.component.scss']
})
export class NuevoAutorComponent implements OnInit {
  autor: IAutor = {
    nombre: '',
    apellido: '',
    fecha_nacimiento: '',
    nacionalidad: ''
  };
  idAutor: number = 0;
  titulo = '';

  constructor(
    private autoresService: AutoresService,
    private ruta: ActivatedRoute,
    private router: Router
  ) {}

  ngOnInit(): void {
    this.idAutor = parseInt(this.ruta.snapshot.paramMap.get('id') || '0');
    if (this.idAutor > 0) {
      this.titulo = 'Editar Autor';
      this.autoresService.uno(this.idAutor).subscribe((data: IAutor) => {
        this.autor = data;  // Cargar los datos para editar
      });
    } else {
      this.titulo = 'Nuevo Autor';
    }
  }

  grabar() {
    // Validar si los campos obligatorios están completos
    if (!this.autor.nombre || !this.autor.apellido || !this.autor.fecha_nacimiento || !this.autor.nacionalidad) {
      Swal.fire({
        icon: 'warning',
        title: 'Campos incompletos',
        text: 'Por favor, complete todos los campos obligatorios.',
      });
      return;
    }

    // Si se está editando un autor existente
    if (this.idAutor > 0) {
      this.autoresService.actualizar(this.autor).subscribe((res: any) => {
        Swal.fire('Actualizado el Autor', res.mensaje, 'success');
        this.router.navigate(['/autores']);
      });
    } 
    // Si es un nuevo autor
    else {
      this.autoresService.insertar(this.autor).subscribe((res: any) => {
        Swal.fire('Autor insertado correctamente', res.mensaje, 'success');
        this.router.navigate(['/autores']);
      });
    }
  }
}
