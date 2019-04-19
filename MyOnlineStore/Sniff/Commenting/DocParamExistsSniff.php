<?php
declare(strict_types=1);

namespace MyOnlineStore\CodingStandard\Sniff\Commenting;

use PHP_CodeSniffer\Exceptions\TokenizerException;
use PHP_CodeSniffer\Files\File;
use PHP_CodeSniffer\Sniffs\Sniff;
use SlevomatCodingStandard\Helpers\AnnotationHelper;

final class DocParamExistsSniff implements Sniff
{
    /**
     * @return int[]
     */
    public function register()
    {
        return [
            T_FUNCTION,
        ];
    }

    /**
     * @param int  $stackPtr
     *
     * @return int|void
     *
     * @throws TokenizerException
     */
    public function process(File $phpcsFile, $stackPtr)
    {
        $annotations = AnnotationHelper::getAnnotations($phpcsFile, $stackPtr);

        if (null === $annotations) {
            return;
        }

        $params = [];
        foreach ($annotations as $annotationName => $specificAnnotations) {
            if ('@param' !== $annotationName) {
                continue;
            }

            foreach ($specificAnnotations as $annotation) {
                $parts = \explode(' ', \str_replace('  ', ' ', $annotation->getContent()));

                if (isset($parts[0]) && '$' === $parts[0][0]) {
                    $params[] = $parts[0];
                }
            }
        }

        $realParams = $phpcsFile->getMethodParameters($stackPtr);

        foreach ($realParams as $param) {
            $key = \array_search($param['name'], $params, true);

            if (false !== $key) {
                unset($params[$key]);
            }
        }

        if (!empty($params)) {
            $phpcsFile->addError(
                'Invalid @param documentation found',
                $stackPtr,
                'MyOnlineStore.CodingStandard.Commenting.InvalidParam'
            );
        }
    }
}
