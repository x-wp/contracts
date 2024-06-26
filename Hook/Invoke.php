<?php // phpcs:disable PHPCompatibility.Variables.ForbiddenThisUseContexts, WordPress.NamingConventions.ValidFunctionName.MethodNameInvalid
/**
 * Invoke enum file.
 *
 * @package eXtended WordPress
 * @subpackage Contracts\Hook
 */

namespace XWP\Contracts\Hook;

/**
 * Hook invocation strategy.
 */
enum Invoke : string {
    /**
     * Invokes the hook directly.
     */
    case Directly = 'directly';

    /**
     * Invokes the hook indirectly.
     *
     * Indirect invoking is an alternative to direct invoking. It enables:
     *  * Conditional invocation
     *  * On-demand and Just-in-time initialization of the handler
     *  * Passing the hook instance to the handler callback
     *
     * ! Caveat emptor: Indirect invoking can be an order of magnitude slower than direct invoking.
     */
    case Indirectly = 'indirectly';

    case WithCustomArgs = 'customArgs';

    case Conditionally = 'conditionaly';

    /**
     * Check if the hook is invoked indirectly.
     *
     * @return bool
     */
    public function isIndirect(): bool {
        return match ( $this ) {
            self::Indirectly,
            self::Conditionally,
            self::WithCustomArgs => true,
            default => false,
        };
    }
}
