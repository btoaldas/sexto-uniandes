import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { ILibro } from '../Interfaces/ilibro'; // Asegúrate de crear esta interfaz
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class LibrosService {
  apiurl = 'http://localhost/sexto-uniandes/examen2/backend/controllers/libros.controller.php?op='; // Cambia la URL según corresponda

  constructor(private http: HttpClient) {}

  // Método para obtener todos los libros
  todos(): Observable<ILibro[]> {
    return this.http.get<ILibro[]>(this.apiurl + 'todos');
  }

  // Método para obtener un libro por su ID
  uno(id: number): Observable<ILibro> {
    const formData = new FormData();
    formData.append('libro_id', id.toString());
    return this.http.post<ILibro>(this.apiurl + 'uno', formData);
  }

  // Método para eliminar un libro por su ID
  eliminar(id: number): Observable<number> {
    const formData = new FormData();
    formData.append('libro_id', id.toString());
    return this.http.post<number>(this.apiurl + 'eliminar', formData);
  }

  // Método para insertar un nuevo libro
  insertar(libro: ILibro): Observable<string> {
    const formData = new FormData();
    formData.append('titulo', libro.titulo);
    formData.append('autor_id', libro.autor_id.toString());
    formData.append('fecha_publicacion', libro.fecha_publicacion);
    formData.append('genero', libro.genero);
    formData.append('isbn', libro.isbn.toString());
    return this.http.post<string>(this.apiurl + 'insertar', formData);
  }

  // Método para actualizar un libro
  actualizar(libro: ILibro): Observable<string> {
    const formData = new FormData();
    formData.append('libro_id', libro.libro_id!.toString()); // Aseguramos que libro_id no es undefined
    formData.append('titulo', libro.titulo);
    formData.append('autor_id', libro.autor_id.toString());
    formData.append('fecha_publicacion', libro.fecha_publicacion);
    formData.append('genero', libro.genero);
    formData.append('isbn', libro.isbn.toString());
    return this.http.post<string>(this.apiurl + 'actualizar', formData);
  }
}
