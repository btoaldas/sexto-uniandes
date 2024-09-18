import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { IAutor } from '../Interfaces/iautor';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class AutoresService {
  apiurl = 'http://localhost/sexto-uniandes/examen2/backend/controllers/autores.controller.php?op='; // Cambia la URL según corresponda

  constructor(private http: HttpClient) {}

  // Método para obtener todos los autores
  todos(): Observable<IAutor[]> {
    return this.http.get<IAutor[]>(this.apiurl + 'todos');
  }

  // Método para obtener un autor por su ID
  uno(id: number): Observable<IAutor> {
    const formData = new FormData();
    formData.append('autor_id', id.toString());
    return this.http.post<IAutor>(this.apiurl + 'uno', formData);
  }

  // Método para eliminar un autor por su ID
  eliminar(id: number): Observable<number> {
    const formData = new FormData();
    formData.append('autor_id', id.toString());
    return this.http.post<number>(this.apiurl + 'eliminar', formData);
  }

  // Método para insertar un nuevo autor
  insertar(autor: IAutor): Observable<string> {
    const formData = new FormData();
    formData.append('nombre', autor.nombre);
    formData.append('apellido', autor.apellido);
    formData.append('fecha_nacimiento', autor.fecha_nacimiento);
    formData.append('nacionalidad', autor.nacionalidad);
    return this.http.post<string>(this.apiurl + 'insertar', formData);
  }

  // Método para actualizar un autor
  actualizar(autor: IAutor): Observable<string> {
    const formData = new FormData();
    formData.append('autor_id', autor.autor_id!.toString()); // Aseguramos que autor_id no es undefined
    formData.append('nombre', autor.nombre);
    formData.append('apellido', autor.apellido);
    formData.append('fecha_nacimiento', autor.fecha_nacimiento);
    formData.append('nacionalidad', autor.nacionalidad);
    return this.http.post<string>(this.apiurl + 'actualizar', formData);
  }

  
}
