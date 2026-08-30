# Zion Tattoo Family — Tema WordPress

**Zion Tattoo Family** es un tema clásico de WordPress, diseñado para un estudio de tatuaje y piercing de Tarragona. Su dirección visual, **Archivo Nocturno**, combina una base de tinta negra, el verde petróleo Tarraco y una composición editorial inspirada en la cultura del tattoo.

> El tema no requiere Elementor, Divi, WPBakery, ACF ni ningún plugin obligatorio. Las entradas de **Artistas** y **Galería** se gestionan desde WordPress mediante tipos de contenido nativos.

## Instalación

En el panel de WordPress, abre **Apariencia → Temas → Añadir nuevo → Subir tema**. Selecciona el archivo `zion-tattoo-theme.zip`, pulsa **Instalar ahora** y, al finalizar, **Activar**. Para que la portada se muestre como una página estática, ve a **Ajustes → Lectura**, selecciona “Una página estática” y elige la página asignada a “Inicio”.

| Acción | Ruta en WordPress | Resultado |
| --- | --- | --- |
| Ajustar logo y datos del estudio | Apariencia → Personalizar → Zion Tattoo · Estudio | Modifica hero, contacto, reserva, horario, redes, Maps e imagen de portada. |
| Definir el color petróleo | Apariencia → Personalizar → Colores | Sustituye el color principal de la identidad. |
| Ajustar estilos de tatuaje | Apariencia → Personalizar → Zion Tattoo · Estudio | Edita la lista de estilos separándolos por comas. |
| Crear artistas | Artistas → Añadir artista | Añade imagen, biografía, extracto, especialidades y perfil/Instagram. |
| Crear una galería | Galería → Añadir pieza | Añade título e imagen destacada; la portada monta una rejilla y lightbox ligera. |
| Configurar menús | Apariencia → Menús | Asigna los menús a “Menú principal” y “Menú del pie”. |

## Personalización

Los textos principales, la URL de reserva, teléfono, correo electrónico, dirección, horario, Google Maps, Instagram e imagen hero se controlan desde el **Customizer nativo**. Los campos que no contienen datos reales conservan marcadores explícitos, como `[PHONE]`, `[EMAIL]` y `[BOOKING URL]`, para evitar inventar información comercial.

Para cambiar el texto fijo de la sección de estudio, piercing o los estilos de tatuaje, abre el archivo correspondiente en `template-parts/`. Cada archivo incluye un comentario que identifica su sección: `HERO SECTION`, `ABOUT SECTION`, `SERVICES SECTION`, `ARTISTS SECTION`, `GALLERY SECTION`, `BOOKING SECTION` o `LOCATION SECTION`.

## Imágenes

La portada muestra inicialmente una fotografía original incluida en `assets/images/zion-hero-studio.jpg`; se sustituye desde **Apariencia → Personalizar → Zion Tattoo · Estudio → Imagen del hero**. Para artistas y galería, usa la **imagen destacada** de cada entrada. El tema incluye un marcador SVG original en `assets/images/studio-placeholder.svg`, utilizado solo cuando aún no se ha cargado una imagen. Así, todas las imágenes pueden sustituirse mediante la biblioteca de medios sin editar plantillas.

## Estructura de archivos

| Archivo o carpeta | Función |
| --- | --- |
| `functions.php` | Punto de entrada: incluye configuración, recursos, Customizer y helpers. |
| `style.css` | Cabecera de metadatos reconocida por WordPress. |
| `theme.json` | Paleta y tipografías disponibles para el editor moderno de WordPress. |
| `header.php` / `footer.php` | Cabecera sticky, menú, CTA de reserva y pie del sitio. |
| `front-page.php` | Ensambla la página de inicio completa. |
| `page.php`, `single.php`, `archive.php`, `search.php`, `index.php`, `404.php` | Plantillas de contenido y archivos estándar. |
| `template-parts/` | Secciones independientes y comentadas de la home. |
| `inc/setup.php` | Soportes del tema, menús, tamaños de imagen, tipos de contenido y campos de artista. |
| `inc/enqueue.php` | Carga ordenada de CSS y JavaScript mediante las APIs WordPress. |
| `inc/customizer.php` | Opciones editables y sanitizadas del Customizer. |
| `inc/template-functions.php` | Helpers reutilizables y fallback del menú. |
| `assets/css/main.css` | Diseño responsive del tema. |
| `assets/js/main.js` | Menú móvil, efectos reveal y lightbox sin librerías externas. |

## Desarrollo y buenas prácticas

El estilo público está en `assets/css/main.css`; el editor utiliza `assets/css/editor.css`. El JavaScript se mantiene deliberadamente pequeño y sin dependencias: respeta `prefers-reduced-motion`, usa `IntersectionObserver` para apariciones al hacer scroll y un `<dialog>` nativo para la galería.

La salida de datos de WordPress utiliza funciones de escape según su contexto, incluidos `esc_html()`, `esc_attr()`, `esc_url()` y `wp_kses_post()`. Las fichas de artista se guardan con nonce, comprobación de capacidad y sanitización. El tema está preparado para traducción con el dominio de texto `zion-tattoo` y es compatible con PHP 8.x y versiones recientes de WordPress.

## Antes de publicar

Sustituye todos los marcadores entre corchetes, carga imágenes reales optimizadas, asigna ambos menús, configura la página de inicio estática y revisa los enlaces de reserva, mapa y redes. Después, recorre el sitio en móvil y escritorio para confirmar el contenido definitivo.
