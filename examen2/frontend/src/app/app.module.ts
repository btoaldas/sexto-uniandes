import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { NgModule } from '@angular/core';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { HttpClientModule } from '@angular/common/http';
import { RouterModule } from '@angular/router';
import { AppRoutingModule } from './app.routing';
import { ComponentsModule } from './components/components.module';
import { AppComponent } from './app.component';
import { AdminLayoutComponent } from './layouts/admin-layout/admin-layout.component';
import { NuevoAutorComponent } from './autores/nuevoautor/nuevoautor.component';
import { MatFormFieldModule } from '@angular/material/form-field';
import { MatInputModule } from '@angular/material/input';
import { NuevoLibroComponent } from './libros/nuevolibro/nuevolibro.component';
import { MatSelectModule } from '@angular/material/select';


@NgModule({
  imports: [
    BrowserAnimationsModule,
    FormsModule,
    ReactiveFormsModule,
    HttpClientModule,
    ComponentsModule,
    RouterModule,
    AppRoutingModule,
    MatFormFieldModule,
    MatInputModule,
    FormsModule,
    MatSelectModule
  ],
  declarations: [
    AppComponent,
    AdminLayoutComponent,
    NuevoAutorComponent,
    NuevoLibroComponent

  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
