import auth0 from '../../lib/auth0';
import { NextApiRequest, NextApiResponse } from 'next';

export default async function shows(req: NextApiRequest, res: NextApiResponse): Promise<void> {
  try {
    const tokenCache = auth0.tokenCache(req, res);
    const { accessToken } = await tokenCache.getAccessToken({
      scopes: ['read:shows']
    });

    const url = `http://localhost/api/private`;
    const response = await fetch(url, {
      headers: {
        Authorization: `Bearer ${accessToken}`
      }
    });

    const shows = await response.json();
    res.status(200).json(shows);
  } catch (error) {
    console.error(error);
    res.status(error.status || 500).json({
      code: error.code,
      error: error.message
    });
  }
}