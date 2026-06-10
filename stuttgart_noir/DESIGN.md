# Design System: High-End Automotive Editorial

## 1. Overview & Creative North Star
The Creative North Star for this design system is **"The Precision Curator."** 

This system rejects the "boxed-in" nature of standard web templates in favor of a high-end, editorial layout inspired by luxury automotive catalogs. We move beyond simple minimalism into a realm of **Atmospheric Luxury**. The experience is defined by expansive negative space, aggressive typographic scales, and a rejection of structural lines. Instead of "UI containers," we treat the screen as a dark, physical gallery where depth is felt through tonal shifts and light is reserved for the most critical actions.

**Key Design Principles:**
*   **Intentional Asymmetry:** Break the grid. Use staggered column starts and overlapping text-on-image elements to create a sense of bespoke engineering.
*   **Boutique Depth:** Avoid shadows. Depth is achieved by "stacking" dark values (Boutique-Black to Boutique-Dark).
*   **The Gold Thread:** The accent color (`#d4a853`) is never used for decoration. It is a "functional highlight"—a surgical strike of color used to guide the eye to the most premium interaction.

---

## 2. Colors & Tonal Architecture
The palette is strictly monochromatic, utilizing a "Black-on-Black" layering strategy to define hierarchy without the clutter of borders.

| Token | Hex | Role |
| :--- | :--- | :--- |
| `surface-dim` | `#0a0a0a` | The "Boutique-Black" canvas. Used for the primary background. |
| `surface-container` | `#131313` | Subtle elevation shift for large content sections. |
| `surface-container-high` | `#1a1a1a` | "Boutique-Dark." The standard surface for cards and interactive modules. |
| `on-surface` | `#f5f5f5` | "Boutique-White." High-contrast, crisp legibility for primary headers. |
| `on-surface-variant` | `#8a8a8a` | "Boutique-Silver." De-emphasized metadata and secondary body text. |
| `secondary` | `#d4a853` | "Signature Gold." Reserved for CTAs, active states, and premium markers. |

### The "No-Line" Rule
**Explicit Instruction:** Do not use 1px solid borders for sectioning. Boundaries must be defined solely through background color shifts.
*   *Instead of a border:* Place a `surface-container-high` (`#1a1a1a`) card on a `surface-dim` (`#0a0a0a`) background.
*   *The Ghost Border Fallback:* Only for complex inputs or distinct accessibility needs, use `outline-variant` (`#2a2a2a`) at 20% opacity.

### Glass & Texture
To achieve a "Precision Engineering" feel, use **Backdrop Blurs**. Floating navigation or overlays should use `surface-container-high` at 70% opacity with a `blur(20px)` effect. This allows the dark background to bleed through, creating an integrated, high-end feel.

---

## 3. Typography
We use a pairing of **Outfit** (for technical precision in displays) and **Inter** (for high-legibility body copy).

*   **Display & Headlines (Outfit):** Set with tight letter-spacing (`-0.02em`) and heavy weights. These should feel like the branding on a performance vehicle.
*   **Body & Labels (Inter):** Set with generous line-height (`1.6`) to ensure an "expensive" amount of breathing room.

| Level | Font | Size | Weight | Case |
| :--- | :--- | :--- | :--- | :--- |
| **Display-LG** | Outfit | 3.5rem | 700 | Sentence |
| **Headline-MD** | Outfit | 1.75rem | 600 | Sentence |
| **Title-SM** | Inter | 1.0rem | 600 | Uppercase |
| **Body-LG** | Inter | 1.0rem | 400 | Sentence |
| **Label-MD** | Inter | 0.75rem | 500 | Uppercase (Tracked) |

---

## 4. Elevation & Depth (The Layering Principle)
In this design system, "Elevation" is a measure of light, not height.

1.  **Tonal Stacking:** For containers, use the spacing scale to create wide gutters (Minimum `spacing-8` or `2.75rem`). Let the transition from `#0a0a0a` to `#1a1a1a` create the "lift."
2.  **Ambient Shadows:** If a card must float (e.g., a modal), use a shadow with a 60px blur at 40% opacity, using the color `#000000`. It should look like an object blocking light, not a "drop shadow."
3.  **Zero Roundedness:** As per the spec, all corners are `0px`. This "Hard-Edge" aesthetic communicates architectural brutalism and precision.

---

## 5. Components

### Buttons
*   **Primary (The Gold Standard):** Background: `#d4a853`, Text: `#0a0a0a`. No border. Transition: Slight scale-up (1.02) on hover.
*   **Secondary (Ghost):** Background: Transparent, Text: `#f5f5f5`, Border: `outline-variant` at 40%.
*   **Interaction:** On click, buttons should provide a subtle tactile shrink.

### Cards & Lists
*   **Rule:** Forbid the use of divider lines.
*   **Execution:** Use vertical white space (`spacing-12`) to separate list items. For cards, use "Full-Bleed" imagery where the image goes edge-to-edge within the `surface-container-high` block.

### Input Fields
*   **Visual Style:** Underline only. Use `#2a2a2a` for the idle state. On focus, the underline transitions to `#d4a853` (Gold) with a width increase from 1px to 2px.
*   **Label:** Always `Label-MD` (Uppercase) floating above the input.

### Signature Component: The "Precision Scrubber"
Instead of a standard slider, use a thin Gold line (`#d4a853`) with a square handle. This mimics the high-end dashboard controls of a luxury vehicle.

---

## 6. Do's and Don'ts

### Do:
*   **Do** use extreme whitespace. If you think there is enough space, add `2rem` more.
*   **Do** use "Boutique-Silver" (`#8a8a8a`) for all non-essential text to maintain the dark atmosphere.
*   **Do** use large-scale imagery that is desaturated or low-key (dark-toned).

### Don't:
*   **Don't** use standard Tailwind `rounded` classes. Everything must be sharp (`0px`).
*   **Don't** use generic icons. Use thin-stroke (1px), minimalist SVG icons.
*   **Don't** use "Electric" colors. Even the Gold accent should be used sparingly—like a signature on a painting.
*   **Don't** use standard "Grey" (`#808080`). Always use the specific boutique tones provided in the palette to ensure the black has "depth" rather than looking "flat."

---

## 7. Implementation (Tailwind Snippet)