export interface ILibro {
  libro_id?: number;
  titulo: string;
  autor_id: number; // Aquí referenciamos al autor
  fecha_publicacion: string; // Usamos string para la fecha
  genero: string;
  isbn: number;
}
