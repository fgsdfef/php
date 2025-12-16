<?php

// Определение базового класса Пицца
class Pizza {
    protected string $name;
    protected string $sauce;
    protected array $toppings = [];

    public function prepare(): void {
        echo "Началась готовка пиццы {$this->name}\n";
        echo "Добавлен соус {$this->sauce}\n";
        echo "Добавлены топинги: " . implode(', ', $this->toppings) . "\n";
    }

    public function cut(): void {
        echo "Данную пиццу нарезают по диагонали\n";
    }
}

// Абстрактный класс Магазина Пиццы
abstract class PizzaStore {
    public function orderPizza(string $type): Pizza {
        $pizza = $this->createPizza($type);
        $pizza->prepare();
        $pizza->cut();
        return $pizza;
    }

    abstract protected function createPizza(string $type): Pizza;
}

// Реализации конкретных пицц
class MargheritaPizza extends Pizza {
    public function __construct() {
        $this->name = "Маргарита";
        $this->sauce = "Томатный";
        $this->toppings = ["Сыр моцарелла", "Базилик"];
    }
}

class PepperoniPizza extends Pizza {
    public function __construct() {
        $this->name = "Пепперони";
        $this->sauce = "Томатный";
        $this->toppings = ["Пепперони", "Сыр моцарелла"];
    }
}

class VeggiePizza extends Pizza {
    public function __construct() {
        $this->name = "Вегетарианская";
        $this->sauce = "Томатный";
        $this->toppings = ["Грибы", "Оливки", "Перец"];
    }
}

// Конкретная реализация магазина
class NewYorkPizzaStore extends PizzaStore {
    protected function createPizza(string $type): Pizza {
        return match ($type) {
            'margherita' => new MargheritaPizza(),
            'pepperoni' => new PepperoniPizza(),
            'veggie' => new VeggiePizza(),
            default => throw new \Exception("Неизвестный тип пиццы: $type")
        };
    }
}

// Пример использования
$store = new NewYorkPizzaStore();
$store->orderPizza('margherita');