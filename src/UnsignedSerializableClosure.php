<?php

namespace Hybrid\SerializableClosure;

use Closure;

class UnsignedSerializableClosure {

    /**
     * The closure's serializable.
     *
     * @var \Hybrid\SerializableClosure\Contracts\Serializable
     */
    protected $serializable;

    /**
     * Creates a new serializable closure instance.
     *
     * @param \Closure $closure
     *
     * @return void
     */
    public function __construct( Closure $closure ) {
        $this->serializable = new Serializers\Native( $closure );
    }

    /**
     * Resolve the closure with the given arguments.
     *
     * @return mixed
     */
    public function __invoke() {
        return call_user_func_array( $this->serializable, func_get_args() );
    }

    /**
     * Gets the closure.
     *
     * @return \Closure
     */
    public function getClosure() {
        return $this->serializable->getClosure();
    }

    /**
     * Get the serializable representation of the closure.
     *
     * @return array{serializable: \Hybrid\SerializableClosure\Contracts\Serializable}
     */
    public function __serialize() {
        return [
            'serializable' => $this->serializable,
        ];
    }

    /**
     * Restore the closure after serialization.
     *
     * @param array{serializable: \Hybrid\SerializableClosure\Contracts\Serializable} $data
     *
     * @return void
     */
    public function __unserialize( $data ) {
        $this->serializable = $data['serializable'];
    }

}
