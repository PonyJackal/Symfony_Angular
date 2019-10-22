<?php

namespace ApiBundle\Repository;

/**
 * Users_teamRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class Users_teamRepository extends \Doctrine\ORM\EntityRepository
{
    public function getIfUserExistInTeam($user_id,$team_id) {

        $userTeam = $this->createQueryBuilder('u')
            ->where('u.TeamsDetails = :team_id AND u.TeamUsers = :user_id AND u.active = :active')
            ->setParameter('team_id', $team_id)
            ->setParameter('user_id', $user_id)
            ->setParameter('active', 1)
            ->getQuery()
            ->getArrayResult();

        return $userTeam;

    }
}