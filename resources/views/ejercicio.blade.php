<x-layouts.app>

        <h1 class="my-4 font-serif text-3xl text-center text-sky-600 dark:text-sky-500"> Datos del empleado</h1>
        @foreach($datos as $persona)
            
            <h3>{{$persona['nombre']}}</h3>
           
           
        @endforeach     
</x-layouts.app>