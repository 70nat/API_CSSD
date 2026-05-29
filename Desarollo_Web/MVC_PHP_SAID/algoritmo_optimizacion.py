import random
import math

# ==============================
# CONFIGURACIÓN DEL PROBLEMA
# ==============================

# Número de ciudades
NUM_CIUDADES = 8

# Generamos coordenadas aleatorias (x, y)
ciudades = [(random.randint(0, 100), random.randint(0, 100)) for _ in range(NUM_CIUDADES)]


# ==============================
# FUNCIONES AUXILIARES
# ==============================

def distancia(ciudad1, ciudad2):
    """
    Calcula la distancia euclidiana entre dos puntos.
    """
    return math.sqrt((ciudad1[0] - ciudad2[0])**2 + (ciudad1[1] - ciudad2[1])**2)


def distancia_total(ruta):
    """
    Calcula la distancia total de una ruta completa.
    Incluye el regreso al punto inicial.
    """
    total = 0
    for i in range(len(ruta)):
        total += distancia(ciudades[ruta[i]], ciudades[ruta[(i + 1) % len(ruta)]])
    return total


# ==============================
# ALGORITMO GENÉTICO
# ==============================

def crear_ruta():
    """
    Genera una ruta aleatoria (permutación de ciudades).
    """
    ruta = list(range(NUM_CIUDADES))
    random.shuffle(ruta)
    return ruta


def crear_poblacion(tamano):
    """
    Crea una población inicial de rutas aleatorias.
    """
    return [crear_ruta() for _ in range(tamano)]


def seleccionar(poblacion):
    """
    Selecciona las mejores rutas (elitismo).
    """
    poblacion.sort(key=lambda x: distancia_total(x))
    return poblacion[:len(poblacion)//2]


def cruzar(padre1, padre2):
    """
    Cruza dos rutas para generar un hijo.
    Método: crossover parcial.
    """
    inicio, fin = sorted(random.sample(range(NUM_CIUDADES), 2))
    
    hijo = [-1] * NUM_CIUDADES
    hijo[inicio:fin] = padre1[inicio:fin]

    pos = 0
    for ciudad in padre2:
        if ciudad not in hijo:
            while hijo[pos] != -1:
                pos += 1
            hijo[pos] = ciudad

    return hijo


def mutar(ruta, prob=0.1):
    """
    Realiza mutaciones intercambiando dos ciudades.
    """
    if random.random() < prob:
        i, j = random.sample(range(NUM_CIUDADES), 2)
        ruta[i], ruta[j] = ruta[j], ruta[i]


def evolucionar(poblacion, generaciones=100):
    """
    Ejecuta el proceso evolutivo.
    """
    for gen in range(generaciones):
        seleccionados = seleccionar(poblacion)

        nueva_poblacion = seleccionados.copy()

        while len(nueva_poblacion) < len(poblacion):
            padre1, padre2 = random.sample(seleccionados, 2)
            hijo = cruzar(padre1, padre2)
            mutar(hijo)
            nueva_poblacion.append(hijo)

        poblacion = nueva_poblacion

        # Mostrar progreso
        mejor = min(poblacion, key=lambda x: distancia_total(x))
        print(f"Generación {gen}: Distancia = {distancia_total(mejor):.2f}")

    return min(poblacion, key=lambda x: distancia_total(x))


# ==============================
# EJECUCIÓN
# ==============================

poblacion = crear_poblacion(50)
mejor_ruta = evolucionar(poblacion, generaciones=100)

print("\nMejor ruta encontrada:")
print(mejor_ruta)
print("Distancia total:", distancia_total(mejor_ruta))