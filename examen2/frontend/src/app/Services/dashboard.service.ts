import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class DashboardService {

  private apiUrl = 'http://localhost/sexto-uniandes/examen2/backend/controllers/dashboard.controller.php';

  constructor(private http: HttpClient) {}

  // Obtener total de libros
  getTotalLibros(): Observable<number> {
    return this.http.get<number>(`${this.apiUrl}?op=total_libros`);
  }

  // Obtener total de autores
  getTotalAutores(): Observable<number> {
    return this.http.get<number>(`${this.apiUrl}?op=total_autores`);
  }

  // Obtener promedio de libros por autor
  getPromedioLibrosPorAutor(): Observable<number> {
    return this.http.get<number>(`${this.apiUrl}?op=promedio_libros`);
  }

  // Obtener cantidad de categorías
  getTotalCategorias(): Observable<number> {
    return this.http.get<number>(`${this.apiUrl}?op=total_categorias`);
  }
}
