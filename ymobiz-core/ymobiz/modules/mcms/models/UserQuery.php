<?php

namespace ymobiz\modules\mcms\models;

use yii\db\ActiveQuery;

/**
 * UserQuery
 *
 */
class UserQuery extends ActiveQuery
{
    /**
     * Only confirmed users.
     *
     * @return $this
     */
    public function confirmed()
    {
        $this->andWhere('confirmed_at IS NOT NULL');

        return $this;
    }

    /**
     * Only unconfirmed users.
     *
     * @return $this
     */
    public function unconfirmed()
    {
        $this->andWhere('confirmed_at IS NULL');

        return $this;
    }
}
