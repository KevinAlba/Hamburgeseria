Restaurant Web App
1. Introducció
Aquest projecte forma part del mòdul de Desenvolupament d’Aplicacions Web i té com a objectiu aplicar els coneixements adquirits durant el primer any del cicle i primer trimestre en un projecte pràctic i funcional.
S’ha desenvolupat una aplicació web completa que simula un entorn real de restauració, incloent la gestió de productes, categories i usuaris, així com la creació de comandes i la visualització de la carta del restaurant.
2. Context i motivació
La digitalització del sector de la restauració fa necessari disposar d’aplicacions web que permetin mostrar la carta i gestionar el contingut de manera eficient. La motivació principal del projecte és crear una solució realista que combini backend i frontend, aplicant bones pràctiques de programació i disseny web.
2.1 Objectius del projecte
Objectius generals
Desenvolupar una aplicació web funcional per a un restaurant.
Implementar un sistema de gestió de productes, categories i usuaris.
Crear una API pròpia per a la comunicació entre frontend i backend.
Emmagatzemar les dades en una base de dades relacional.
Objectius d’aprenentatge
Aprendre PHP i la combinació amb HTML.
Creació d’interfícies web netes i estructurades.
Implantació de Bootstrap per a disseny responsiu.
Ús i administració de sessions i cookies amb PHP.
Creació i utilització de classes, incloent abstracció i polimorfisme.
Anàlisi i identificació d’errors d’UX/UI.
3. Descripció general del projecte
L’aplicació permet als usuaris:
Registrar-se i iniciar sessió
Visualitzar la carta, incloent menús, productes i postres
Fer comandes, afegir al carretó i pagar
L’administrador pot:
Crear, editar i eliminar productes, categories, comandes i usuaris
Filtrar i gestionar contingut des d’un panell de control
La comunicació entre frontend i backend es realitza mitjançant una API desenvolupada en PHP que retorna dades en format JSON.
3.1 Resultats esperats
Aplicació funcional i estable
Dades persistides correctament a la base de dades
Interfície clara i intuïtiva
3.2 Beneficis
Facilitat de gestió del contingut del restaurant
Millora de l’experiència de l’usuari
Sistema escalable i reutilitzable
4. Anàlisi
4.1 Requisits funcionals
RF01: Mostrar la carta del restaurant
RF02: Filtrar productes per categories
RF03: L’administrador pot crear productes
RF04: L’administrador pot editar productes
RF05: L’administrador pot eliminar productes
RF06: L’administrador pot crear comandes
RF07: L’administrador pot editar comandes
RF08: L’administrador pot eliminar comandes
RF09: Gestionar usuaris
RF10: Disposar d’una API REST
RF11: Els usuaris poden fer comandes, afegir-les al carretó i pagar
RF12: Gestionar ofertes dels productes
4.2 Requisits no funcionals
RNF01: Els usuaris no poden veure ni triar els ingredients individuals d’una hamburguesa