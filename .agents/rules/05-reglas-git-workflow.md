---
trigger: always_on
---

# Reglas de Flujo de Trabajo Git (Git Workflow)

## Estructura de Ramas (Branching Model)
El flujo de trabajo se basará en un modelo profesional (tipo GitFlow simplificado). Queda estrictamente prohibido trabajar o hacer commits directamente sobre las ramas principales.
- **`main`**: Rama de producción. El código aquí debe ser 100% estable, minificado y listo para desplegar en el espacio web de IONOS.
- **`develop`**: Rama de integración y entorno de pruebas local. Todo el desarrollo finalizado y verificado converge aquí antes de pasar a producción.
- **`feature/*`**: Ramas de desarrollo individual para nuevas características, páginas o secciones.
- **`bugfix/*` o `hotfix/*`**: Ramas exclusivas para la corrección de errores.

## Nomenclatura de Ramas
- Toda nueva implementación debe nacer desde `develop` hacia una nueva rama.
- Formato obligatorio: `tipo/descripcion-corta-con-guiones`.
- Ejemplos válidos: `feature/seccion-sobre-nosotros`, `feature/formulario-contacto-ajax`, `bugfix/alineacion-logo-mobile`.

## Convención de Commits (Conventional Commits)
- Los mensajes de commit deben ser descriptivos, técnicos, profesionales y explicar el "qué" y el "por qué" del cambio.
- **Estructura**: `tipo: descripción breve en infinitivo o imperativo`.
- **Tipos permitidos**:
  - `feat:` (Nueva característica, archivo HTML o funcionalidad JS).
  - `fix:` (Corrección de un error o bug visual).
  - `docs:` (Cambios en documentación, README o reglas MD).
  - `style:` (Cambios en CSS, diseño, espaciados, que no afectan la lógica).
  - `refactor:` (Reestructuración de código para hacerlo más limpio sin alterar su comportamiento).
  - `perf:` (Mejoras de rendimiento, como optimización de imágenes o minificación).
- **Ejemplos válidos**: 
  - `feat: crear estructura HTML semántica para la página de servicios`
  - `style: aplicar variables de color corporativas al header`
  - `perf: implementar lazy loading en imágenes de inicio`

## Flujo de Integración (Ciclo de Vida)
1. **Creación**: Crear la rama `feature/*` a partir de `develop`.
2. **Desarrollo**: Realizar commits atómicos y descriptivos dentro de la rama.
3. **Verificación y Merge a Develop**: Una vez que la tarea se da por terminada y validada en el servidor local, el agente debe hacer merge de la rama `feature/*` hacia `develop`.
4. **Merge a Main (Pase a Producción)**: Cuando se haya completado un hito del proyecto (ej. la web entera o una sección completa lista para publicar en IONOS), se hará un merge desde `develop` hacia `main`.
5. **Limpieza**: Tras el merge exitoso, la rama `feature/*` debe ser eliminada para mantener el repositorio limpio.