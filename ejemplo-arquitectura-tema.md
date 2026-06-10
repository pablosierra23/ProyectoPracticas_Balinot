# Revisión de arquitectura (WordPress \+ WooCommerce)

Objetivo: estandarizar la estructura del tema, mejorar mantenibilidad y alinearlo con las prácticas de WP/Woo. 

---

## 1\) Estructura general recomendada (estado actual)

**Propuesta de carpetas:**

balinot-theme/

├─ functions.php

├─ languages/

├─ screenshot.png

├─ readme.txt

├─ inc/

│  ├─ setup.php

│  ├─ assets.php

│  ├─ template-tags.php

│  ├─ utils/

│  │  ├─ format.php

│  │  └─ security.php

│  ├─ compat/

│  │  ├─ woo-delivery-date-manager.php

│  │  └─ woocommerce-brands.php

│  ├─ admin/

│  │  └─ README.md

│  ├─ security/

│  │  └─ hardening.php

│  ├─ customizer/ (si aplica)

│  ├─ blocks/ (si aplica)

│  ├─ woocommerce/

│  │  ├─ archive-filters.php

│  │  ├─ checkout.php

│  │  ├─ checkout-admin.php

│  │  ├─ ajax.php

│  │  ├─ hooks.php

│  │  └─ template-tags.php

├─ template-parts/

│  ├─ woocommerce/

│  │  ├─ archive-sidebar.php

│  │  └─ archive-sidebar-render.php

│  └─ components/ (hero.php, confianza.php, footer.php)

├─ woocommerce/

│  ├─ archive-product.php

│  ├─ content-product.php

│  └─ ... (overrides oficiales)

└─ assets/

   ├─ src/

   │  └─ README.md

   └─ dist/

      └─ README.md

**Por qué:**

- `inc/` para lógica y funciones (no templates).  
- `template-parts/` para parciales del tema (estándar WP).  
- `/woocommerce/` exclusivamente para overrides del plugin.  
- `assets/src` \+ `assets/dist` para build moderno y caché controlada.  
- `languages/` para traducciones y `load_theme_textdomain()`.

---

## 2\) Archivos detectados y reubicación recomendada (estado actual)

### A) `inc/woocommerce-archive-filters.php`

**Actual:** `inc/woocommerce-archive-filters.php` (loader de compatibilidad)  
**Recomendado:** `inc/woocommerce/archive-filters.php` (activo)  
**Por qué:** agrupar lógica Woo en un submódulo `inc/woocommerce/`.

**Encolado:**

- Cargarlo desde `functions.php` o `inc/setup.php` con `require_once`.

---

### B) `inc/wc-functions.php`

**Actual:** `inc/wc-functions.php` (loader de compatibilidad)  
**Recomendado:** módulos en `inc/woocommerce/*` y carga desde `functions.php`.

**Por qué:** evitar “archivos contenedor” con funciones heterogéneas.

---

### C) `templates/partials/woocommerce/archive-sidebar.php`

**Actual:** loader de compatibilidad  
**Recomendado:** `template-parts/woocommerce/archive-sidebar.php`

**Por qué:** `template-parts/` es el estándar para parciales reutilizables.

---

### D) `templates/partials/woocommerce/archive-sidebar-render.php`

**Actual:** loader de compatibilidad  
**Recomendado:** `template-parts/woocommerce/archive-sidebar-render.php`

**Por qué:** mismo motivo que el punto anterior.

---

## 3\) Reglas de carga (encolado de archivos) \- estado actual

**`functions.php` debería:**

- Incluir solo los módulos necesarios.  
- No contener lógica de negocio.

Ejemplo recomendado:

require\_once get\_theme\_file\_path('inc/setup.php');

require\_once get\_theme\_file\_path('inc/assets.php');

require\_once get\_theme\_file\_path('inc/utils/format.php');

require\_once get\_theme\_file\_path('inc/utils/security.php');

require\_once get\_theme\_file\_path('inc/template-tags.php');

require\_once get\_theme\_file\_path('inc/compat/woo-delivery-date-manager.php');

require\_once get\_theme\_file\_path('inc/compat/woocommerce-brands.php');

require\_once get\_theme\_file\_path('inc/security/hardening.php');

// WooCommerce

require\_once get\_theme\_file\_path('inc/woocommerce/archive-filters.php');

require\_once get\_theme\_file\_path('inc/woocommerce/hooks.php');

require\_once get\_theme\_file\_path('inc/woocommerce/ajax.php');

require\_once get\_theme\_file\_path('inc/woocommerce/checkout.php');

require\_once get\_theme\_file\_path('inc/woocommerce/checkout-admin.php');

---

## 4\) Separación clara: Hooks vs Template Tags (Woo)

**`hooks.php`**

- Solo `add_action` / `add_filter` \+ callbacks de comportamiento.

**`template-tags.php` (o `template-functions.php`)**

- Funciones que devuelven HTML o datos para templates.

**Por qué:** evita duplicidad y “cajón desastre”.

---

## 5\) Assets con buenas prácticas actuales

**Estructura recomendada:**

- `assets/src/` → SCSS, JS modular.  
- `assets/dist/` → build final.  
- Versionado por `filemtime()` o manifest (Vite/Webpack).

**Por qué:** evita caché rota, permite carga condicional limpia y coherente.

---

## 6\) Beneficios de esta estructura

- **Mantenibilidad:** cada responsabilidad en su módulo.  
- **Compatibilidad:** sigue los estándares de WP/Woo.  
- **Escalabilidad:** más fácil añadir features sin romper el tema.

---

## 7\) Siguientes pasos sugeridos

1. Mantener loaders de compatibilidad o retirarlos cuando se limpie el histórico.  
2. Definir pipeline de build (Vite/Webpack) para escribir en `assets/dist/`.  
3. Añadir `languages/*.po/.mo` y flujo de traducciones.  
4. Auditar más compat (plugins adicionales) si se integran en checkout/tienda.

